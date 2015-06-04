<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\category\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
$jsStr = <<<JS
    $(function(){
        $('tr[pid!=0]').hide();
        $('.showPlus').toggle(function(){
            $(this).removeClass().addClass('showMinus');
            var index = $(this).parents('tr').attr('cid');
            $('tr[pid=' + index + ']').show();
        },function(){
            $(this).removeClass().addClass('showPlus');
            var index = $(this).parents('tr').attr('cid');
            $('tr[pid=' + index + ']').hide();
        })
    });
JS;
$this->registerJs($jsStr);
?>
<div class="category-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <br/>

    <div class="grid-view">
        <table class="table table-striped table-bordered"><thead>
            <tr pid="0"><th width="5%">ID</th><th width="5%">展开</th><th>分类名称</th><th>路由</th><th>状态</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php foreach($model as $v) : ?>
            <tr pid="<?=$v->pid?>" cid="<?=$v->id?>"><td><?=$v->id?></td>
                <td><a href="javascript:void(0)" class="showPlus">aaa</a> </td>
                <td><?=$v->html.$v->name?></td>
                <td><?=$v->rote?></td>
                <td><?=ArrayHelper::getValue(\app\modules\category\models\Category::type(),$v->type)?></td>
                <td><a href="<?=Url::to(['update','id'=>$v->id])?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;
                    <a href="<?=Url::to(['delete','id'=>$v->id])?>"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;&nbsp;
                    <a href="<?=Url::to(['create','pid'=>$v->id])?>"><span class="glyphicon glyphicon-plus"></span></a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody></table> </div>

</div>

