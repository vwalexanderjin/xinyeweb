<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ad\models\Ad */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-view">

    <p>
        <?= Html::a(Yii::t('app', 'Back To Ads'), ['index'], ['class' => 'btn btn-success']) ?>
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
            'id',
            'title',
            'description',
            'mark',
            'href',
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' =>  (isset($model->img) && ($model->img!=null)) ? '<img src='.Yii::$app->request->baseUrl . '/uploads/ad/'.$model->img.' style="height:200px" />' : '<img src='.Yii::$app->request->baseUrl . '/uploads/post/no_img.png />',
            ],
            'position',
            [
                'attribute' => 'ctime',
                'foramt' => 'raw',
                'value' => date('Y-m-d H:i:s', $model->ctime)
            ],
            [
                'attribute' => 'utime',
                'foramt' => 'raw',
                'value' => date('Y-m-d H:i:s', $model->utime)
            ],
            [
                'attribute' => 'status',
                'value' => \yii\helpers\ArrayHelper::getValue(\app\modules\ad\models\Ad::status(),$model->status)
            ],
            'cid',
            'sort',
        ],
    ]) ?>

</div>
