<?php
use yii\helpers\Html;
$this->title = Yii::t('app','Blog');
?>
<div class="c-banner">
    <h1 class="c-title-4"><?= Html::encode($this->title) ?></h1>
</div>
<!--/c-banner-->
<div class="blog-container">
    <div class="c-title-2">
        <img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/images/icon-14.png" alt="">
        <h2>我们的想法，建议，公司发展资讯。</h2>
    </div>
    <!--/c-title-2-->
    <div class="blog-post">
        <?php foreach($blogList as $v): ?>
            <article>
                <figure><a href="<?= \yii\helpers\Url::toRoute(['blog/view','id'=>$v['id']]) ?>"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/images/blog-no-img.png" alt=""></a></figure>
                <div class="main">
                    <h5><a href="#"><?= $v['title'] ?></a> <small>[ 分类名称 ]</small></h5>
                    <div class="date"><?= date('Y-m-d', $v['utime']) ?></div>
                    <div class="content"><?= $v['info']  ?></div>
                    <a href="<?= \yii\helpers\Url::toRoute(['blog/view','id'=>$v['id']]) ?>" class="btn-blog"><?= Yii::t('app', 'readView') ?></a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
    <!--/blog-list-->

    <?= \yii\widgets\LinkPager::widget([
        'firstPageLabel'	=> '',
        'nextPageCssClass' => '',
        'lastPageLabel'	=> '',
        'prevPageLabel'	=> '<<',
        'nextPageLabel'	=> '>>',
        'maxButtonCount'=> 5,
        'activePageCssClass'=> 'active',
        'options'   =>  ['class'=>'page-nav'],
        'pagination'=>$pages]) ?>

    <!--<div class="page-nav">

        <a href="#">&lt;&lt;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">&gt;&gt;</a>
    </div>-->
    <!--/page-nav-->
</div>
<!--/blog-container-->