<?php
use yii\grid\GridView;
?>
<div>
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
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template'  =>  '&nbsp;{update}&nbsp;&nbsp;{delete}&nbsp;',
                'headerOptions' => ['width' => '80']],
        ],
        'layout' => "{items}\n{pager}",
    ]);
    ?>
</div>
