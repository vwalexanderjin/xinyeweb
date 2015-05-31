<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '角色列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'searchpermission-form',
    'validateOnChange' => true,
    'action' => Url::toRoute(['role/search']),
]); ?>
<?= $form->field($item, 'name', ['template' => '{input}'])->textInput(); ?>
<?= Html::submitButton('搜索角色', ['class' => 'btn btn-primary']); ?>&nbsp;
<?= Html::a('创建角色', ['role/create'], ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>
    &nbsp;
<?= $this->render('_list', ['model' => $model]); ?>