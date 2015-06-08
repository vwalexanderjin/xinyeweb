<?php
use yii\helpers\Html;
$this->title = $article->title;
?>
<div class="c-banner">
    <h1 class="c-title-4"><?= Yii::t('app', 'Blog') ?></h1>
</div>
<!--/c-banner-->
<div class="blog-container">
    <div class="c-title-2">
        <img src="<?= Yii::$app->request->baseUrl ?>/images/icon-14.png" alt="">
        <h3><?= Html::encode($article->title) ?></h3>
    </div>
    <!--/c-title-2-->
    <div class="blog-post">
        <article class="detail">
            <figure id="zoom-con">
                <a href="<?= Yii::$app->request->baseUrl ?>/uploads/post-1-big.jpg" data-lightbox="image-1">
                    <img src="<?= Yii::$app->request->baseUrl ?>/uploads/post-1.png" alt="">
                    <div class="zoom">
                        <div class="mask"></div>
                        <div class="zoom-gla"></div>
                    </div>
                </a>
            </figure>
            <div class="main">
                <div class="date">2014.3.17</div>
                <div class="content">
                    <?= $article->content ?>
                </div>
                <div class="share">
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style_32x32">
                        <a class="jiathis_button_qzone"></a>
                        <a class="jiathis_button_tsina"></a>
                        <a class="jiathis_button_tqq"></a>
                        <a class="jiathis_button_weixin"></a>
                        <a class="jiathis_button_renren"></a>
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                        <a class="jiathis_counter_style"></a>
                    </div>
                    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                    <!-- JiaThis Button END -->
                </div>
                <a href="<?= \yii\helpers\Url::toRoute('/article/index') ?>" class="btn-blog">返回博客</a>
            </div>
        </article>
    </div>
    <!--/blog-list-->
</div>
<!--/blog-container-->