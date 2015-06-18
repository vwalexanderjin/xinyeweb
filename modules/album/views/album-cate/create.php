<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\album\models\AlbumCate */

$this->title = Yii::t('app', 'Create Album Cate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Album Cates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-cate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
