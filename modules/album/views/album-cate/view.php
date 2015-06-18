<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\album\models\AlbumCate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Album Cates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-cate-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>

    </p>
    <br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'description',
            'ctime:datetime',
        ],
    ]) ?>

    <?=\app\core\widgets\Uploadify\Uploadify::widget([
        'url' => \yii\helpers\Url::to(['album/upload','cid'=>Yii::$app->request->get('id',0)]),
        'jsOptions'=>['buttonText'=>'添加图片']
    ]); ?>

    <table class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>全选</th><th>图片</th><td>操作</td></tr>
            <?php foreach($albumList as $v) : ?>
            <tr><th><input type="checkbox"></th><th>相册描述</th><td>2015xxxx大学xxx年xxxx班毕业照</td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
