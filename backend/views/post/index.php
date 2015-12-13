<?php
use yii\helpers\Html;
use yii\grid\GridView;
use hscstudio\mimin\components\Mimin;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <div class="block">
        <div class="block-title">
            <div class="block-options pull-left">
                <?= Html::a(Yii::t('app', '<i class="fa fa-list"></i>'), ['index'], ['class' => 'btn btn-alt btn-sm btn-default', 'data-toggle'=>'tooltip', 'title'=>'','data-original-title'=>'Tambah User']) ?>
            </div>
            <h6><?= Html::encode($this->title) ?></h6>

            <div class="block-options pull-right">
                <?php
                if ((Mimin::filterRoute($this->context->id.'/create'))){ ?>
                <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i>'), ['create'], ['class' => 'btn btn-alt btn-sm btn-default', 'data-toggle'=>'tooltip', 'title'=>'','data-original-title'=>'Tambah User']) ?>
                <?php } ?>
            </div>
        </div>
        <div class="wp-posts-index">
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'content:ntext',
            [
            'class' => 'yii\grid\DataColumn', // can be omitted, default
            'attribute' => 'category_id',
            'value' => function ($data) {
            return $data->category->name;
            },
            ],
            [
            'attribute' => 'status',
            'value' => function ($data) {
            return (($data->status)==1)?"Publish":"Draft";
            },
            ],
            // 'create_time:datetime',
            // 'update_time:datetime',
            // 'user_id',
            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width:170px; z-index:20;'],
            'header' => 'Actions',
            'template' => Mimin::filterTemplateActionColumn(['view','update','delete'], $this->context->route),
            'buttons' => [
            'view' => function ($url, $model) {
            return Html::a(' <button type="button" class="btn btn-danger data-placement="top">
            lihat
            </button>', Yii::$app->urlManager->createUrl(['post/view','tahun' => $model->tahun, 'judul' => $model->title]), [
            'title' => Yii::t('yii', 'Proses'),
            'data-confirm' => Yii::t('yii', 'Apakah Anda Yakin Ingin Melakukan Proses?'),
            ]);},
              'update' => function ($url, $model) {
            return Html::a(' <button type="button" class="btn btn-danger data-placement="top">
            Ubah
            </button>', Yii::$app->urlManager->createUrl(['post/update','tahun' => $model->tahun, 'judul' => $model->title]), [
            'title' => Yii::t('yii', 'Proses'),
            'data-confirm' => Yii::t('yii', 'Apakah Anda Yakin Ingin Melakukan Proses?'),
            ]);},
            ],
            ],
            ],
            ]); ?>
        </div>
    </div>

</div>