<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\category\models\Category */

$this->title = Yii::t('app', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Back To Categorys'), ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <br/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
