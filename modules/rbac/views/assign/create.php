<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin(['id' => 'assign-form']); ?>
<?= $form->field($model, 'item_name')->dropDownList(ArrayHelper::map($roleList,'name','name')) ?>
<?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($userList,'id','username')) ?>
<?= Html::submitButton('提交', ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>