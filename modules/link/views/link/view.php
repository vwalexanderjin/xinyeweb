<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\modules\link\models\Link;

/* @var $this yii\web\View */
/* @var $model app\modules\link\models\Link */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-view">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Back To Links'), ['index'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'id',
                'header' => 'width:10%'
            ],
            'title',
            [
                'attribute' => 'logo',
                'format' => 'raw',
                'value' => (isset($model->logo) && ($model->logo!=null)) ? '<img src='.Yii::$app->request->baseUrl . '/uploads/link/'.$model->logo.' style="width:200px" />' : '<img src='.Yii::$app->request->baseUrl . '/uploads/post/no_img.png />',
            ],
            'href',
            //'ctime:datetime',
            [
                'attribute' => 'ctime',
                'value' => date('Y-m-d', $model->ctime)
            ],
            //'utime:datetime',
            [
                'attribute' => 'status',
                'value' => ArrayHelper::getValue(Link::status(), $model->status)
            ],
            [
                'attribute' => 'type',
                'value' => ArrayHelper::getValue(Link::type(), $model->type)
            ],
            'cid',
            'order',
        ],
        'template' => '<tr><th width="10%">{label}</th><td>{value}</td></tr>',
    ]) ?>

</div>
