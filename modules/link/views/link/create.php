<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\link\models\Link */

$this->title = Yii::t('app', 'Create Link');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-create">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Back To Links'), ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <br/

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
