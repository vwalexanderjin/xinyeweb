<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\config\models\BasicConfig */
/* @var $form ActiveForm */
?>
<div class="basic-form">

    <div class="col-md-3 col-sm-4">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sys_site_name') ?>
        <?= $form->field($model, 'sys_site_description') ?>
        <?= $form->field($model, 'sys_site_keywords') ?>
        <?= $form->field($model, 'sys_site_url') ?>
        <?= $form->field($model, 'sys_default_role') ?>
        <?= $form->field($model, 'sys_utc') ?>
        <?= $form->field($model, 'sys_date_format') ?>
        <?= $form->field($model, 'sys_date_format_custom') ?>
        <?= $form->field($model, 'sys_time_format') ?>
        <?= $form->field($model, 'sys_time_format_custom') ?>
        <?= $form->field($model, 'sys_lang')->dropDownList(\app\modules\config\models\BasicConfig::sysLanguage()) ?>
        <?= $form->field($model, 'sys_icp') ?>
        <?= $form->field($model, 'sys_stat') ?>
        <?= $form->field($model, 'sys_allow_register') ?>
        <?= $form->field($model, 'sys_site_email') ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

</div><!-- basic-form -->
