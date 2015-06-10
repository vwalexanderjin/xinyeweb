<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\post\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-9 col-sm-8">

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_second')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

        <?/*= $form->field($model, 'content')->textarea(['rows' => 20]) */?>
        <?= $form->field($model, 'content')->widget(\app\core\widgets\UEditor\UEditor::className()) ?>


    </div>

    <div class="col-md-3 col-sm-4">
        <?= $form->field($model, 'cid')->dropDownList(ArrayHelper::map(\app\modules\category\models\Category::getCateList(),'id','name')) ?>

        <?= $form->field($model, 'redirect_url')->textInput(['maxlength' => true]) ?>

        <?/*= $form->field($model, 'thumb')->textInput(['maxlength' => true]) */?>

        <?= Html::activeFileInput($model, 'thumb',['class'=>'form-control']) ?>

        <?php
            if (!$model->thumb) {
                echo 1;
            }
        ?>

        <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'template')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ishot')->radioList(\app\modules\post\models\Post::isHot()) ?>

        <?= $form->field($model, 'status')->radioList(\app\modules\post\models\Post::status()) ?>

        <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
