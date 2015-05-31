<?php
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<?php
if(isset($model)){
    echo GridView::widget([
        'dataProvider' => $model,
        'columns' => [
            [
                'attribute' => 'item_name',
                'label' => '角色名称',
            ],
            [
                'attribute' => 'user_id',
                'label' => '用户ID',
            ],
            [
                'attribute' => 'created_at',
                'label' => '创建时间',
                'format' => 'datetime',
            ],
            ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'headerOptions' => ['width' => '80']],
        ],
        'layout' => "{items}\n{pager}",
    ]);
} else {
    $form = ActiveForm::begin([
        'id' => 'searchassign-form',
        'validateOnChange' => true,
        'action' => Url::to(['assign/search'])
    ]);
    echo Html::submitButton('查询', ['class' => 'btn btn-primary']);
    echo $form->field($assign, 'item_name')->dropDownList(ArrayHelper::map($roleList, 'name','name'),['prompt'=>'Select...']);
    echo $form->field($assign, 'user_id')->dropDownList(ArrayHelper::map($userList, 'id','username'),['prompt'=>'Select...']);
    ActiveForm::end();
}
?>