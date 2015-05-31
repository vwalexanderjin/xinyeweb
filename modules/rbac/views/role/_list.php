<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>
<div>
    <?=
    GridView::widget([
        'dataProvider' => $model,
        'columns' => [
            [
                'attribute' => 'name',
                'label' => '角色名称',
            ],
            [
                'attribute' => 'description',
                'label' => '角色描述',
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
            /*[
                'label'=>'权限管理',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['aaaa/aaa','id'=>$data->name]);
                    return Html::a('<span class="glyphicon glyphicon-user">权限管理</span>', $url, ['title' => '审核']);
                }
            ],*/
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template'  =>  '{permission}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                /*'buttons'   =>  [
                    'permission' =>  function($url, $model, $key) {
                        $url = \yii\helpers\Url::to(['admin/rbac/assing/view','id'=>$model->name]);
                        return Html::a('<span class="glyphicon glyphicon-user"></span>',$url, ['title'=>'权限管理']);
                    }
                ],*/
                'headerOptions' => ['width' => '80']
            ],
        ],
        'layout' => "{items}\n{pager}",
    ]);
    ?>
</div>
