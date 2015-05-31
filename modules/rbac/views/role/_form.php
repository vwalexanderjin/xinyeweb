<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\rbac\models\Item */
/* @var $form ActiveForm */
?>
<style>
    .checkbox{
        display: inline-block;
    }
</style>
<div class="permission-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-permission',
    ]); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'child')->checkboxList(ArrayHelper::map($permissions,'name','name'),['separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;']) ?>
        <div class="form-group">
            <?= Html::a("返　回",['role/index'],['class' => 'btn btn-info']) ?>
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div><!-- _form -->
