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
    // jQ 1.9版本以上移除了toggle 绑定多个click事件
    /*$(document).ready(function() {
        $('tr[pid!=0]').hide();
        $('.showPlus').toggle(function(){
            $(this).removeClass('showPlus').addClass('showMinus');
            var index = $(this).parents('tr').attr('cid');
            $('tr[pid=' + index + ']').show();
        },function(){
            $(this).removeClass('showMinus').addClass('showPlus');
            var index = $(this).parents('tr').attr('cid');
            $('tr[pid=' + index + ']').hide();
        })
    });*/
    /*$(document).ready(function(){
          $('tr[pid!=0]').hide();
          $('.showPlus').on("click",function(){
            if($(this).hasClass("glyphicon-minus")) {//已有表示已展开 所以点击关闭
                $(this).removeClass("glyphicon-minus");
                var index = $(this).parents('tr').attr('cid');
                $('tr[pid=' + index + ']').hide();
            } else {//没有表示已关闭 点击展开
                $(this).addClass("glyphicon-minus");
                var index = $(this).parents('tr').attr('cid');
                $('tr[pid=' + index + ']').show();
            }
          })
    });*/
    //方法二：
    $(document).ready(function(){
        $('tr[level!=1]').hide();
        $('.showPlus').click(function() {
            //先取出当前的tr
            var tr = $(this).parent().parent();
            //取出当前行的level
            var level = tr.attr("level");
            if($(this).hasClass("glyphicon-plus")) { // +号
                //向后找所有的tr 并循环
                tr.nextAll().each(function(k,v){
                    if (parseInt($(this).attr("level")) > level) { //大于level 为子类
                        $(this).find(".showPlus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                        $(this).show();
                    } else { //否则不是
                        return false; //直到相同就退出循环
                    }
                })
                $(this).removeClass("glyphicon-plus").addClass("glyphicon-minus");
            } else { // -号
                //向后找所有的tr 并循环
                tr.nextAll().each(function(k,v){
                    if (parseInt($(this).attr("level")) > level) { //大于level 为子类
                        $(this).hide();
                    } else { //否则不是
                        return false; //直到相同就退出循环
                    }
                })
                $(this).removeClass("glyphicon-minus").addClass("glyphicon-plus");
            }

        })
    });
JS;
$this->registerJs($jsStr);

$styleStr = <<<STYLE
.showPlus {display:block; curosr:pointer}
STYLE;
$this->registerCss($styleStr);
?>
<div class="category-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <br/>
    <div class="grid-view">
        <table class="table table-bordered mytable"><thead>
            <tr level="1"><th width="5%">ID</th><th width="5%">展开</th><th width="60%">分类名称</th><th width="10%">状态</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php foreach($model as $v) : ?>
            <tr level="<?=$v->level?>"><td><?=$v->id?></td>
                <td><a class="glyphicon glyphicon-plus showPlus"></a> </td>
                <td><?=$v->html.$v->name?></td>
                <td><?=ArrayHelper::getValue(\app\modules\category\models\Category::type(),$v->type)?></td>
                <td><a href="<?=Url::to(['update','id'=>$v->id])?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;
                    <a href="<?=Url::to(['delete','id'=>$v->id])?>"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;&nbsp;
                    <a href="<?=Url::to(['create','pid'=>$v->id])?>"><span class="glyphicon glyphicon-plus"></span></a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody></table> </div>

</div>

