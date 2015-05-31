<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\post\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl ?>/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
    window.UEDITOR_HOME_URL = "<?= Yii::$app->request->baseUrl ?>/ueditor/";
    window.onload = function(){
        window.UEDITOR_CONFIG.initialFrameWidth = 1000;
        window.UEDITOR_CONFIG.initialFrameHeight = 600;
        UE.getEditor('content');
    }

</script>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl ?>/ueditor/ueditor.config.js"></script>
<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-9 col-sm-8">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>
        <tr>
            <th><?= Html::activeLabel($model, 'content') ?></th>
            <td><?= Html::activeTextarea($model, 'content', ['id'=>'content','rows' => 6]) ?>
                <?= Html::error($model, 'content')?>
            </td>
        </tr>
    </div>

    <div class="col-md-3 col-sm-4">
        <?= $form->field($model, 'thumb')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'ishot')->textInput() ?>
        <?= $form->field($model, 'status')->textInput() ?>
        <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'cid')->textInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
