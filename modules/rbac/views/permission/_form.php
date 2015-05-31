<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\rbac\models\Item */
/* @var $form ActiveForm */
?>
<div class="permission-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-permission',
    ]); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'description') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _form -->
