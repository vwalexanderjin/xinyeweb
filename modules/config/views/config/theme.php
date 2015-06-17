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

        <?= $form->field($model, 'sys_site_theme')->radioList(\app\modules\config\models\ThemeConfig::getThemes()) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

</div><!-- basic-form -->
