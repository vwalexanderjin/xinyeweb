<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\album\models\AlbumCate */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Album Cate',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Album Cates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="album-cate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
