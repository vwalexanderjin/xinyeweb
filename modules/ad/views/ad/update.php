<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ad\models\Ad */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ad',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ad-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
