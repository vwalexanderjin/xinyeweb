<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\link\models\search\LinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Links');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Link'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout'=> '{items}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'logo',
            'href',
            'ctime:datetime',
            // 'utime:datetime',
            // 'status',
            [
                'attribute' => 'type',
                'value' => function($model){
                    return  \yii\helpers\ArrayHelper::getValue(\app\modules\link\models\Link::type(),$model->type);
                }
            ],
            // 'cid',
            // 'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
