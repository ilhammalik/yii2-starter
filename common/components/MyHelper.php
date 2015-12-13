<?php

namespace common\components;

use yii\base\Component;
use common\models\User;
use common\models\Actionlog;
use common\models\Logkategori;
use yii\helpers\Url;
use yii\db\Query;
use Yii;
use yii\helpers\Html;
use common\models\Gol;
use common\models\Struk;

class MyHelper extends Component {


    //membuat angka random 3karakter

    public function random() {
        $str = '';
        for ($i = 0; $i < 3; $i++) {
            $str .= mt_rand(0, 9);
        }

        return $str;
    }
    //fungsi tanggal format indonesia
    function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
} 
    //ilham manambahkan fungsi terbilang gunaya ketika ada angka makaakan ditampilkan terbilangya
    public function Terbilang($x) {
        $ambil = array("", "satu", "dua", "tiga", "empat", "lima", "enam ", "tujuh",
            "delapan", "sembilan", "sepuluh", "sebelas", "koma");
        if ($x < 12)
            return " " . $ambil[$x];
        elseif ($x < 20)
            return self::Terbilang($x - 10) . " belas";
        elseif ($x < 100)
            return self::Terbilang($x / 10) . " puluh" . self::Terbilang($x % 10);
        elseif ($x < 200)
            return " seratus" . self::Terbilang($x - 100);
        elseif ($x < 1000)
            return self::Terbilang($x / 100) . " ratus" . self::Terbilang($x % 100);
        elseif ($x < 2000)
            return " seribu" . self::Terbilang($x - 1000);
        elseif ($x < 1000000)
            return self::Terbilang($x / 1000) . " ribu" . self::Terbilang($x % 1000);
        elseif ($x < 1000000000)
            return self::Terbilang($x / 1000000) . " juta" . self::Terbilang($x % 1000000);
        elseif ($x < 1000000000)
            return self::Terbilang($x / 1000000000) . " milyar" . self::Terbilang($x % 1000000000);
    }

 

    public function number_to_words($number)
    {
        $before_comma = trim(self::to_word($number));
        $after_comma = trim(self::comma($number));
        return ucwords($results = $before_comma.' koma '.$after_comma);
    }

    public function to_word($number)
    {
        $words = "";
        $arr_number = array(
        "",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan",
        "sepuluh",
        "sebelas");

        if($number<12)
        {
            $words = " ".$arr_number[$number];
        }
        else if($number<20)
        {
            $words = self::to_word($number-10)." belas";
        }
        else if($number<100)
        {
            $words = self::to_word($number/10)." puluh ".self::to_word($number%10);
        }
        else if($number<200)
        {
            $words = "seratus ".self::to_word($number-100);
        }
        else if($number<1000)
        {
            $words = self::to_word($number/100)." ratus ".self::to_word($number%100);
        }
        else if($number<2000)
        {
            $words = "seribu ".self::to_word($number-1000);
        }
        else if($number<1000000)
        {
            $words = self::to_word($number/1000)." ribu ".self::to_word($number%1000);
        }
        else if($number<1000000000)
        {
            $words = self::to_word($number/1000000)." juta ".self::to_word($number%1000000);
        }
        else
        {
            $words = "undefined";
        }
        return $words;
    }

    public function comma($number)
    {
        $after_comma = stristr($number,'.');
        $arr_number = array(
        "nol",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan");

        $results = "";
        $length = strlen($after_comma);
        $i = 1;
        while($i<$length)
        {
            $get = substr($after_comma,$i,1);
            $results .= " ".$arr_number[$get];
            $i++;
        }
        return $results;
    }
    //membuat password otomatis
    public function GeneratePassword() {

        $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang = strlen($karakter);
        $rand = '';
        for ($i = 0; $i < 7; $i++) {
            $rand .= $karakter[rand(0, $panjang - 1)];
        }
        return $rand;
    }

    public function Cut($string, $max_length) {
        if (strlen($string) > $max_length) {
            $string = substr($string, 0, $max_length);
            $pos = strrpos($string, " ");
            if ($pos === false) {
                return substr($string, 0, $max_length) . "...";
            }
            return substr($string, 0, $pos) . "...";
        } else {
            return $string;
        }
    }

    public function Arsip($arsip) {
        //fungsi untuk memanggil arsip
        switch ($arsip) {
            case 3: {
                    $arsip = 'Sudah Di Simpan Arsip';
                }
                break;
            default: {
                    $arsip = 'Sudah Di Simpan Arsip';
                }
                break;
        }
        return $arsip;
    }
        public function Kwitansi($kw) {
        //fungsi untuk memanggil kwitansi
        switch ($kw) {
            case 2: {
                    $kw = 'Tidak Ada Kwitansi';
                }
                break;
                 case 1: {
                    $kw = 'Kwitansi Ada';
                }
                break;
            default: {
                    $kw = 'Pilih Status Kwitansi';
                }
                break;
        }
        return $kw;
    }
    //aliasa Untuk Pagu
      public function Apagu($kw) {
        //fungsi untuk memanggil kwitan i110000,120000,130000,161100,151000
        switch ($kw) {
            case 110000 : {
                    $kw = 'Deputi PI';
                }
                break;
                 case 120000: {
                    $kw = 'Deputi PKN';
                }
                break;
                case 130000: {
                    $kw = 'Sekretariat Utama';
                }
                break;
                  case 161100: {
                    $kw = 'Inspektorat';
                }
                break;
                  case 151000: {
                    $kw = 'Balai Diklat';
                }
                break;
        }
        return $kw;
    }
    //untuk memanggil tingkatat berdasarkan eselon
        public function Tingkat($kw) {
        //fungsi untuk memanggil kwitansi
        switch ($kw) {
            case 1: {
                    $kw = 'Tingkat A';
                }
                break;
            case 2: {
                    $kw = 'Tingkat B';
                }
                break;
            case 3: {
                    $kw = 'Tingkat C';
                }
                break;
            case 99: {
                    $kw = 'Tingkat D';
                }
                break;
            default: {
                    $kw = 'Tidak ada';
                }
                break;
        }
        return $kw;
    }
    //memanggil tahun 5 tahun kebelakang
    public function CallTahun() {
        $tahun = date('Y') - 5;
        for ($i = 0; $i < 5; $i++) {

            $tahun = $tahun + 1;
            $th[] = $tahun;
        }
        return $th;
    }

    //memanggil nama username berdasarkan id
    public function User($id) {
        $user = User::find()
                ->Count();
        return $user;
    }
     public function Negara($id) {
        $gole = \backend\models\DafNegara::find()
                ->where(['kode_negara' => $id])
                ->one();
        return $gole->nama;
    }

    public function Gole($id) {
        $gole = Gol::find()
                ->where(['gol_id' => $id])
                ->one();
        return $gole->golongan;
    }

    public function Pangkat($id) {
        $gole = Gol::find()
                ->where(['gol_id' => $id])
                ->one();
        return $gole->pangkat;
    }

    public function Unit($id) {
        $gole = \common\models\DaftarUnit::find()
                ->where(['unit_id' => $id])
                ->one();
        return $gole->nama;
    }
    
     public function Real($id) {
        $real = Yii::$app->db->createCommand('select sum(pagu) from t_mak where unit_id='.$id)->queryScalar();
        return $real;
    }
    

    public function Angkutan($id) {
        $gole = \common\models\Angkutan::find()
                ->where(['angkutan_id' => $id])
                ->one();
        return $gole->nama;
    }

    public function Kota($id) {
        $gole = \common\models\MasterKokab::find()
                ->where(['kota_id' => $id])
                ->one();
        return $gole->kokab_nama;
    }

    public function Struk($id) {
        //$ese = Ese::findOne()
        $struk = Struk::find()
                ->where(['struk_id' => $id])
                //->joinWith('daf_eselon', false, 'INNER JOIN')
                ->one();
        return $struk->eselon_id;
    }

    public function Jab($id) {
        //$ese = Ese::findOne()
        $struk = Struk::find()
                ->where(['struk_id' => $id])
                //->joinWith('daf_eselon', false, 'INNER JOIN')
                ->one();
        return $struk->nama;
    }

    public function Eselon($id) {
        //$ese = Ese::findOne()
        $struk = \common\models\DafEse::find()
                ->where(['eselon_id' => $id])
                //->joinWith('daf_eselon', false, 'INNER JOIN')
                ->one();
        return $struk->eselon;
    }

    //memanggil nama bulan berdasarkan urutan
    public function BacaBulan($bln) {
        switch ($bln) {
            case 1 : {
                    $bln = 'Januari';
                }break;
            case 2 : {
                    $bln = 'Februari';
                }break;
            case 3 : {
                    $bln = 'Maret';
                }break;
            case 4 : {
                    $bln = 'April';
                }break;
            case 5 : {
                    $bln = 'Mei';
                }break;
            case 6 : {
                    $bln = "Juni";
                }break;
            case 7 : {
                    $bln = 'Juli';
                }break;
            case 8 : {
                    $bln = 'Agustus';
                }break;
            case 9 : {
                    $bln = 'September';
                }break;
            case 10 : {
                    $bln = 'Oktober';
                }break;
            case 11 : {
                    $bln = 'November';
                }break;
            case 12 : {
                    $bln = 'Desember';
                }break;
            default: {
                    $bln = 'UnKnown';
                }break;
        }
        return $bln;
    }

    public function BacaHari($bln) {
        switch ($bln) {
            case 1 : {
                    $bln = 'Satu';
                }break;
            case 2 : {
                    $bln = 'Dua';
                }break;
            case 3 : {
                    $bln = 'Tiga';
                }break;
            case 4 : {
                    $bln = 'Empat';
                }break;
            case 5 : {
                    $bln = 'Lima';
                }break;
            case 6 : {
                    $bln = "Enam";
                }break;
            case 7 : {
                    $bln = 'Tujuh';
                }break;
            case 8 : {
                    $bln = 'Delapan';
                }break;
            case 9 : {
                    $bln = 'Sebilan';
                }break;
            case 10 : {
                    $bln = 'Sepuluh';
                }break;
            case 11 : {
                    $bln = 'Sebelas';
                }break;
            case 12 : {
                    $bln = 'Dua Belas';
                }break;
            case 13 : {
                    $bln = 'Tiga Belas';
                }break;
            case 14 : {
                    $bln = 'Empat Belas';
                }break;
            case 15 : {
                    $bln = 'Lima Belas';
                }break;
            case 16 : {
                    $bln = 'Enam Belas';
                }break;
            case 17 : {
                    $bln = 'Tujuh Belas';
                }break;
            case 18 : {
                    $bln = 'Delapan Belas';
                }break;
            case 19 : {
                    $bln = 'Sembilan Belas';
                }break;
            case 20 : {
                    $bln = 'Dua Puluh';
                }break;
            case 21 : {
                    $bln = 'Dua Puluh Satu';
                }break;
            case 22 : {
                    $bln = 'Dua Puluh Dua';
                }break;
            case 23 : {
                    $bln = 'Dua Puluh Tiga';
                }break;
            case 24 : {
                    $bln = 'Dua Puluh Empat';
                }break;
            case 25 : {
                    $bln = 'Dua Puluh Lima';
                }break;
            case 26 : {
                    $bln = 'Dua Puluh Enam';
                }break;
            case 27 : {
                    $bln = 'Dua Puluh Tujuh';
                }break;
            case 28 : {
                    $bln = 'Dua Puluh Delapan';
                }break;
            case 29 : {
                    $bln = 'Dua Puluh Sembilan';
                }break;
            case 30 : {
                    $bln = 'Tiga Puluh ';
                }break;
            case 31 : {
                    $bln = 'Tiga Puluh Satu';
                }break;
            default: {
                    $bln = 'UnKnown';
                }break;
        }
        return $bln;
    }

    public function Formattgl($tgl) {
        $tanggal = substr($tgl, 8, 2);
        $bulan = self::BacaBulan(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

    public function Berangkattgl($tgl) {
        $tanggal = substr($tgl, 8, 2) - 1;
        $bulan = self::BacaBulan(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

    public function Datangtgl($tgl) {
        $tanggal = substr($tgl, 8, 2) + 1;
        $bulan = self::BacaBulan(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

    public function Romawi($bln) {
        switch ($bln) {
            case 1 : {
                    $bln = 'I';
                }break;
            case 2 : {
                    $bln = 'II';
                }break;
            case 3 : {
                    $bln = 'III';
                }break;
            case 4 : {
                    $bln = 'IV';
                }break;
            case 5 : {
                    $bln = 'V';
                }break;
            case 6 : {
                    $bln = "VI";
                }break;
            case 7 : {
                    $bln = 'VII';
                }break;
            case 8 : {
                    $bln = 'VIII';
                }break;
            case 9 : {
                    $bln = 'IX';
                }break;
            case 10 : {
                    $bln = 'X';
                }break;
            case 11 : {
                    $bln = 'XI';
                }break;
            case 12 : {
                    $bln = 'XII';
                }break;
            default: {
                    $bln = 'UnKnown';
                }break;
        }
        return $bln;
    }

    public function Hari($hari){
        $tanggal = $hari;
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $hari = $dayList[$day];
    return $hari;
    }

    //function untuk eselon
    public function Ese($ese) {
        switch ($ese) {
            case 0 : {
                    $ese = 'Belum DI Pilih';
                }break;
            case 1 : {
                    $ese = 'I';
                }break;
            case 2 : {
                    $ese = 'II';
                }
            case 3 : {
                    $ese = 'III';
                }
            case 3 : {
                    $ese = 'IV';
                }
            default: {
                    $ese = 'Belum Di pilih';
                }break;
        }
        return $ese;
    }

    //function untuk gol

    public function Gol($gol) {
        switch ($gol) {
            case 0 : {
                    $gol = 'Belum DI Pilih';
                }break;
            case 1 : {
                    $gol = 'I';
                }break;
            case 2 : {
                    $gol = 'II';
                }
            case 3 : {
                    $gol = 'III';
                }
            case 3 : {
                    $gol = 'IV';
                }
            default: {
                    $gol = 'Belum Di pilih';
                }break;
        }
        return $gol;
    }

    //memanggil nama hari
    public function GetDayName($day) {
        $day = date('l', strtotime($day));
        switch ($day) {
            case 'Sunday' : {
                    $day = 'Minggu';
                }break;
            case 'Monday': {
                    $day = 'Senin';
                }break;
            case 'Tuesday': {
                    $day = 'Selasa';
                }break;
            case 'Wednesday': {
                    $day = 'Rabu';
                }break;
            case 'Thursday' : {
                    $day = 'Kamis';
                }break;
            case 'Friday' : {
                    $day = 'Jumat';
                }break;
            case 'Saturday' : {
                    $day = 'Sabtu';
                }break;
        }
        return $day;
    }

    function GetHari($hari) {
        $hari2 = date("");
        Switch ($hari2) {
            case 0 : $hari = "Ahad";
                Break;
            case 1 : $hari = "Senin";
                Break;
            case 2 : $hari = "Selasa";
                Break;
            case 3 : $hari = "Rabu";
                Break;
            case 4 : $hari = "Kamis";
                Break;
            case 5 : $hari = "Jumat";
                Break;
            case 6 : $hari = "Sabtu";
                Break;
        } return $hari;
    }

    //memanggil nama tahun, bulan hari
    public function CallDay() {

        $hari = date('w');
        $tgl = date('d');
        $bln = date('m');
        $thn = date('Y');
        switch ($hari) {
            case 0 : {
                    $hari = 'Minggu';
                }break;
            case 1 : {
                    $hari = 'Senin';
                }break;
            case 2 : {
                    $hari = 'Selasa';
                }break;
            case 3 : {
                    $hari = 'Rabu';
                }break;
            case 4 : {
                    $hari = 'Kamis';
                }break;
            case 5 : {
                    $hari = "Jum'at";
                }break;
            case 6 : {
                    $hari = 'Sabtu';
                }break;
            default: {
                    $hari = 'UnKnown';
                }break;
        }

        switch ($bln) {
            case 1 : {
                    $bln = 'Januari';
                }break;
            case 2 : {
                    $bln = 'Februari';
                }break;
            case 3 : {
                    $bln = 'Maret';
                }break;
            case 4 : {
                    $bln = 'April';
                }break;
            case 5 : {
                    $bln = 'Mei';
                }break;
            case 6 : {
                    $bln = "Juni";
                }break;
            case 7 : {
                    $bln = 'Juli';
                }break;
            case 8 : {
                    $bln = 'Agustus';
                }break;
            case 9 : {
                    $bln = 'September';
                }break;
            case 10 : {
                    $bln = 'Oktober';
                }break;
            case 11 : {
                    $bln = 'November';
                }break;
            case 12 : {
                    $bln = 'Desember';
                }break;
            default: {
                    $bln = 'UnKnown';
                }break;
        }
        $sekarang = "Hari " . $hari . ", Tanggal " . $tgl . " " . $bln . " " . $thn;
        return $sekarang;
    }

    public function CountAng($id) {
        /* $command = Yii::$app->db->createCommand("SELECT 
          sum(transport+taksi+taksi2+lumpsum+uhr+uhr_fb+penginapan+representatif+trans_pim+inap_lain+inap_fb )
          FROM perjadin where nomi_id=16"); */
        $command = Yii::$app->db->createCommand("SELECT sum(jml) FROM  simpel_rincian_biaya where id_kegiatan=" . $id . " and bukti_kwitansi in(1,2) GROUP BY id_kegiatan");
        $sum = $command->queryScalar();
        $counts = \backend\models\SimpelPersonil::find()
                ->where([
                    'id_kegiatan' => $id,
                ])
                ->count();

        if (!empty($counts)) {
            return 'Rp.  ' . number_format($sum,0,',','.') . '   <br/>  ( ' . $counts . ' org)';
        } else {
            return "-";
        }
    }

    public function CountUang($id) {
        /* $command = Yii::$app->db->createCommand("SELECT 
          sum(transport+taksi+taksi2+lumpsum+uhr+uhr_fb+penginapan+representatif+trans_pim+inap_lain+inap_fb )
          FROM perjadin where nomi_id=16"); */
        $command = Yii::$app->db->createCommand("SELECT sum(jml) FROM  simpel_rincian_biaya where id_kegiatan=" . $id . " and bukti_kwitansi in(1,2) GROUP BY id_kegiatan");
        $sum = $command->queryScalar();
        $counts = \backend\models\SimpelPersonil::find()
                ->where([
                    'id_kegiatan' => $id,
                ])
                ->count();


        if (!empty($counts)) {
            return 'Rp.  ' . number_format($sum,0,',','.');
        } else {
            return "-";
        }
    }
      public function CountKw($id) {
        /* $command = Yii::$app->db->createCommand("SELECT 
          sum(transport+taksi+taksi2+lumpsum+uhr+uhr_fb+penginapan+representatif+trans_pim+inap_lain+inap_fb )
          FROM perjadin where nomi_id=16"); */
        $command = Yii::$app->db->createCommand("SELECT sum(jml) FROM  simpel_rincian_biaya where personil_id=" . $id . " and bukti_kwitansi in(1,2) GROUP BY id_kegiatan");
        $sum = $command->queryScalar();
        $counts = \backend\models\SimpelPersonil::find()
                ->where([
                    'id_personil' => $id,
                ])
                ->count();


        if (!empty($counts)) {
            return 'Rp.  ' . number_format($sum,0,',','.');
        } else {
            return "-";
        }
    }



    public function CountJum($id) {
        /* $command = Yii::$app->db->createCommand("SELECT 
          sum(transport+taksi+taksi2+lumpsum+uhr+uhr_fb+penginapan+representatif+trans_pim+inap_lain+inap_fb )
          FROM perjadin where nomi_id=16"); */
        $command = Yii::$app->db->createCommand("SELECT sum(jml) FROM  simpel_rincian_biaya where id_kegiatan=" . $id . " and bukti_kwitansi in(1,2) GROUP BY id_kegiatan");
        $sum = $command->queryScalar();
        $counts = \backend\models\SimpelPersonil::find()
                ->where([
                    'id_kegiatan' => $id,
                ])
                ->count();


        if (!empty($counts)) {
            return $sum;
        } else {
            return "-";
        }
    }

     public function CountUper($id) {
        /* $command = Yii::$app->db->createCommand("SELECT 
          sum(transport+taksi+taksi2+lumpsum+uhr+uhr_fb+penginapan+representatif+trans_pim+inap_lain+inap_fb )
          FROM perjadin where nomi_id=16"); */
        $command = Yii::$app->db->createCommand("SELECT sum(jml) FROM  simpel_rincian_biaya where personil_id=" . $id . " and bukti_kwitansi in(1,2) GROUP BY id_kegiatan");
        $sum = $command->queryScalar();
        $counts = \backend\models\SimpelPersonil::find()
                ->where([
                    'id_personil' => $id,
                ])
                ->count();


        if (!empty($counts)) {
            return $sum;
        } else {
            return "-";
        }
    }

      public function Rincian($id) {
        $sum = Yii::$app->db->createCommand("SELECT sum(jml) FROM  simpel_rincian_biaya where id_kegiatan=" . $id . " and bukti_kwitansi in(1,2) GROUP BY id_kegiatan")->queryScalar();
        return $sum;
     }

     
   



    //total realisasi
    //awal sisa
}
