<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '许可名称';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'searchpermission-form',
    'validateOnChange' => true,
    'action' => Url::toRoute(['permission/search']),
]); ?>
<?= $form->field($item, 'name', ['template' => '{input}'])->textInput(); ?>
<?= Html::submitButton('搜索', ['class' => 'btn btn-primary']); ?>&nbsp;
<?= Html::a('创建许可', ['permission/create'], ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>
    &nbsp;
<?= $this->render('_list', ['model' => $model]); ?>