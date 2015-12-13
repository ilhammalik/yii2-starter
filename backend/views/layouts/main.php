<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\icons\Icon;
use yii\helpers\Url;
use  \common\components\MyHelper;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js"> 
    <head>
        <meta charset="utf-8" />
        <title>ILHAM CMS</title>
        <meta name="author" content="ilham malik ibrahim" />
        <meta name="robots" content="noindex, nofollow" />
        <meta name="Ilham Malik Ibrahim" content="Ilhan Malik Ibrahim">
        <meta name="www.ipteku.com" content="ilhammalik19@gmail.com">
            <?= Html::csrfMetaTags() ?>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
        <?php $this->head() ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body onload="startTime()">
        <?php $this->beginBody() ?>
        <div id="page-container" class="sidebar-full">
            <?= $this->render('//layouts/sidebar.php') ?>

            <div id="main-container">
                <header class="navbar navbar-default">
                    <ul class="nav navbar-nav-custom">
                        <li class="hidden-xs hidden-sm">
                            <a href="javascript:void(0)" id="sidebar-toggle-lg">
                                <i class="fa fa-list-ul fa-fw"></i>
                            </a>
                        </li>
                        <li class="hidden-md hidden-lg">
                            <a href="javascript:void(0)" id="sidebar-toggle-sm">
                                <i class="fa fa-bars fa-fw"></i>
                            </a>
                        </li>
                        <li class="hidden-md hidden-lg">
                            <a href="./index.php.html">
                                <i class="gi gi-stopwatch fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                   

                    <ul class="nav navbar-nav-custom pull-right">
                       
                          <li>
                            <br/>
                            <i class="fa fa-calendar fa-fw"></i> <?= MyHelper::GetDayName(date('l')).' '.MyHelper::Formattgl(date('Y-m-d')) ?> <i class="fa fa-clock-o fa-fw pull-right"></i>&nbsp;&nbsp;
                        </li>
                        
                        <li>
                            <br/>
                            <div id="txt"></div>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <?= Html::img('@web/theme/img/User-Icon.png'); ?><i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">

                                <li class="divider"></li>
                                <li>
                                    <?= Html::a(Yii::t('app', ' <i class="fa fa-user fa-fw pull-right"></i> Profile'), ['/user/profile', 'id' => Yii::$app->user->id]) ?>
                                </li>
                                <li>
                                    <?= Html::a(Yii::t('app', ' <i class="fa fa-key fa-fw pull-left"></i> Ubah Kata Sandi'), ['/user/pass', 'id' => Yii::$app->user->id]) ?>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <?=
                                    Html::a(Yii::t('app', ' <i class="fa fa-sign-out fa-fw"></i> Logout'), ['/site/logout'], [
                                        //'class' => 'btn btn-danger',
                                        'data' => [
                                            //'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                            'method' => 'post',
                                        ],
                                    ])
                                    ?>
                                </li>
                            </ul>
                            </header><div id="page-content">
                                <?=
                                Breadcrumbs::widget([
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ])
                                ?>
                                <?= Alert::widget() ?>

                                <?= $content ?>

                            </div>
                            <footer class="clearfix">
                                <div class="pull-right">
                                   <a href="http://www.ipteku.com" target="_blank">Ilham Malik Ibrahim</a>
                                    
                                </div>
                                <div class="pull-left">
                                   <a href="http://www.ipteku.com" target="_blank">Copyright Ilham Malik Ibrahim <?php echo date('Y') ?> </a>
                                </div>
                            </footer>
                            </div>
                            </div>
                            <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

                            <?php $this->endBody() ?>   
                            </body>
                            </html>
                            <?php $this->endPage() ?>
                            <meta name="Ilham Malik Ibrahim" content="Ilhan Malik Ibrahim">
                            <meta name="www.ipteku.com" content="ilhammalik19@gmail.com">
<script type="text/javascript">
var base_url = window.location.origin;
    tinymce.init({
    selector: ".textareas",theme: "modern",height:300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path: base_url+"<?= Url::to('/yii2-cms/admin/filemanager/filemanager/') ?>",
   relative_urls : false,
   convert_urls : false,
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : base_url+"<?= Url::to('/yii2-cms/admin/filemanager/filemanager/plugin.min.js') ?>"}
 });
</script>
<script type="text/javascript">
var base_url = window.location.origin;
    tinymce.init({
    selector: ".textarea1",theme: "modern",height:200,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak nonbreaking table ",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor "
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   image_advtab: true ,
   
   external_filemanager_path: base_url+"<?= Url::to('/yii2-cms/admin/filemanager/filemanager/') ?>",
   relative_urls : false,
   convert_urls : false,
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : base_url+"<?= Url::to('/yii2-cms/admin/filemanager/filemanager/plugin.min.js') ?>"}
 });
</script>
