<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\post\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Back To Posts'), ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'title_second',
            'redirect_url:url',
            [
                'format'=> 'raw',
                'attribute' => 'thumb',
                'value' => (isset($model->thumb) && ($model->thumb!=null)) ? '<img src='.Yii::$app->request->baseUrl . '/uploads/post/'.$model->thumb.' style="height:200px" />' : '<img src='.Yii::$app->request->baseUrl . '/uploads/post/no_img.png />',
            ],
            'from',
            'seo_title',
            'seo_keywords',
            'seo_description',
            'template',
            'tags',
            [
                'attribute' => 'ishot',
                'value' => \yii\helpers\ArrayHelper::getValue($model->isHot(),$model->ishot)
            ],
            [
                'attribute' => 'status',
                'value' => \yii\helpers\ArrayHelper::getValue($model->status(), $model->status)
            ],
            'info',
            //'content:ntext',
            [
                'attribute' => 'content',
                'format' => 'raw'
            ],
            //'ctime:datetime',
            [
                'attribute'=> 'ctime',
                'value' => date('Y-m-d', $model->ctime),
                'options' => [
                    'width'=>300
                ]
            ],
            //'utime:datetime',
            [
                'attribute'=> 'utime',
                'value' => date('Y-m-d', $model->utime)
            ],
            'type',
            [
                'attribute'=>'cid',
                'value' => $model->category->name
            ],
            //'uid',
        ],
        'template' => '<tr><th width="10%">{label}</th><td>{value}</td></tr>',
        'options' => ['class' => 'table table-striped table-hover table-bordered detail-view'],
    ]) ?>

</div>
