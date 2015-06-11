<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\link\models\Link */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="link-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->fileInput(['class'=>'form-control']) ?>

    <br>
    <?php
    if (empty($model->logo)) {
        $thumb = Yii::$app->request->baseUrl . "/uploads/post/no_img.png";
    } else {
        $thumb = Yii::$app->request->baseUrl . '/uploads/link/'.$model->logo;
    }
    echo '<img src="'.$thumb.'" class="img-thumbnail" style="width:200px">';
    ?>
    <br>

    <?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'type')->radioList(\app\modules\link\models\Link::type()) ?>

    <?= $form->field($model, 'cid')->textInput() ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
