<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\post\models\search\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'title_second') ?>

    <?= $form->field($model, 'redirect_url') ?>

    <?= $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'from') ?>

    <?php // echo $form->field($model, 'seo_title') ?>

    <?php // echo $form->field($model, 'seo_keywords') ?>

    <?php // echo $form->field($model, 'seo_description') ?>

    <?php // echo $form->field($model, 'template') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'ishot') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'ctime') ?>

    <?php // echo $form->field($model, 'utime') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'uid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
