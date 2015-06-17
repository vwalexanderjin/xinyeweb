<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\config\models\EmailConfig */
/* @var $form ActiveForm */
?>
<div class="config-email">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email_host') ?>
        <?= $form->field($model, 'email_username') ?>
        <?= $form->field($model, 'email_password') ?>
        <?= $form->field($model, 'email_port') ?>
        <?= $form->field($model, 'email_encryption') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- config-email -->
