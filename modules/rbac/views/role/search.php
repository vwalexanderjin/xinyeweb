<?php
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = 'Search Role';
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a("返回",['role/index'],['class' => 'btn btn-primary']) ?>
</p>
<?=
GridView::widget([
    'dataProvider' => $model,
    'columns' => [
        [
            'attribute' => 'name',
            'label' => '许可名称',
        ],
        [
            'attribute' => 'description',
            'label' => '许可描述',
        ],
        [
            'attribute' => 'created_at',
            'label' => '创建时间',
            'format' => ['date', 'Y-m-d H:i:s'],
            'options' => ['width' => '180'],
        ],
        [
            'attribute' => 'updated_at',
            'label' => '创建时间',
            'format' => ['date', 'Y-m-d H:i:s'],
            'options' => ['width' => '180'],
        ],
        ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'headerOptions' => ['width' => '80']],
    ],
    'layout' => "{items}\n{pager}",
]);
?>