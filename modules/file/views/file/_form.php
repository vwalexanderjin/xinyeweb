<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\file\models\FileForm */
/* @var $form ActiveForm */
?>
<div class="file-_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'content')->textarea(['rows'=>20]) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- file-_form -->
