<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\post\models\search\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

   <!-- <h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => '{items} {pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'title_second',
            'redirect_url:url',
            'thumb',
            // 'from',
            // 'seo_title',
            // 'seo_keywords',
            // 'seo_description',
            // 'template',
            // 'tags',
            // 'ishot',
            // 'status',
            // 'info',
            // 'content:ntext',
            // 'ctime:datetime',
            // 'utime:datetime',
            // 'type',
             [
                 'attribute' => 'cid',
                 'value' => 'category.name',
             ],
            // 'uid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
