<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\post\models\Post */

$this->title = Yii::t('app', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Back To Posts'), ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <br/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
