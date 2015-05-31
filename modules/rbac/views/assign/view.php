<?php
use yii\widgets\DetailView;
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'item_name',
            'label' => '角色',
        ],
        [
            'attribute' => 'user_id',
            'label' => '用户ID',
        ],
        [
            'attribute' => 'created_at',
            'format' => 'datetime',
            'label' => '创建时间',
        ],
    ],
]) ?>