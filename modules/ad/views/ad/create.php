<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ad\models\Ad */

$this->title = Yii::t('app', 'Create Ad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-create">

    <p>
        <?= Html::a(Yii::t('app', 'Back To Ads'), ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    <br/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
