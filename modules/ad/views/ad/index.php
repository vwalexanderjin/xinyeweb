<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ad\models\search\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ad'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items} {pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            //'description',
            //'mark',
            //'href',
             [
                 'attribute' => 'img',
                 'format' => 'raw',
                 'value' => function($model) {
                     if (isset($model->img) && $model->img != null) {
                         $img = Yii::$app->request->baseUrl . '/uploads/ad/' . $model->img;
                     } else {
                         $img = Yii::$app->request->baseUrl . '/uploads/post/no_img.png';
                     }
                    return "<img src='{$img}' height='90px;'>";
                 },
             ],
             'position',
            // 'ctime',
            // 'utime',
            // 'status',
            // 'cid',
            // 'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
