<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app','xinyeweb');
?>
<div class="da-slider" id="da-slider">
    <div class="da-slide da-slide-current">
        <h2>我们制作精良的 WEB 与 移动 APP 程式。</h2>
        <p>像个工匠，我们关心我们做了什么。每个像素都精致，每一行代码都高效。</p>
        <div class="da-img"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/images/banner-item-1.png" alt=""></div>
    </div>
    <div class="da-slide">
        <h2>我们制作精良的 WEB 与 移动 APP 程式。</h2>
        <p>像个工匠，我们关心我们做了什么。每个像素都精致，每一行代码都高效。</p>
        <div class="da-img"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/images/banner-item-1.png" alt=""></div>
    </div>
    <nav class="da-arrows">
        <span class="da-arrows-prev"></span>
        <span class="da-arrows-next"></span>
    </nav>
</div>
<!--/da-slider-->
<section class="welcome-words">
    <div class="c-title"><span><?= Yii::t('app', 'Welcome') ?></span></div>
    <p>鑫烨是总部位于中国珠海的一家现代网络产品和设计公司。我们专注于品牌推广，网络推广，网页设计，APP程式设计，微信开发。我们是一个充满活力和决心的团队，致力于帮助您的企业或个人获得成功。</p>
</section>
<!--/index-welcome-->
<section class="what-we-do">
    <div class="mask"></div>
    <div class="content">
        <div class="c-title-white"><span>我们做些什么</span></div>
        <div class="list">
            <div class="item">
                <img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/images/icon-1.png" alt="">
                <p>品牌/网络推广</p>
            </div>
            <div class="item">
                <img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/images/icon-2.png" alt="">
                <p>网页/APP设计</p>
            </div>
            <div class="item">
                <img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/images/icon-3.png" alt="">
                <p>微信开发</p>
            </div>
            <div class="item">
                <img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/images/icon-4.png" alt="">
                <p>图像设计</p>
            </div>
        </div>
    </div>
</section>
<!--/what-we-do-->
<section class="home-case">
    <div class="c-title"><span>近期项目</span></div>
    <ul class="list" id="home-showbox">
        <li>
            <a href="http://www.xiazhinet.com"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/uploads/c1.jpg" alt=""></a>
            <div class="showbox">
                <div class="overlay"></div>
                <div class="content">
                    <h3>干啥</h3>
                    <p>网页设计,前端开发,手机APP</p>
                    <a href="http://www.xiazhinet.com" class="btn-view">访问站点</a>
                </div>
            </div>
        </li>
        <li>
            <a href="http://www.tvsstyle.com/"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/uploads/c2.jpg" alt=""></a>
            <div class="showbox">
                <div class="overlay"></div>
                <div class="content">
                    <h3>南方风尚</h3>
                    <p>网页设计,前端开发</p>
                    <a href="http://www.tvsstyle.com/" class="btn-view">在线案例</a>
                </div>
            </div>
        </li>
        <li>
            <a href="http://www.chasss.com/"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/uploads/c3.jpg" alt=""></a>
            <div class="showbox">
                <div class="overlay"></div>
                <div class="content">
                    <h3>茶也</h3>
                    <p>网页设计,前端开发,WEB触屏版</p>
                    <a href="http://www.chasss.com/" class="btn-view">在线案例</a>
                </div>
            </div>
        </li>
        <li>
            <a href="http://www.iya.mo/"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/uploads/c4.jpg" alt=""></a>
            <div class="showbox">
                <div class="overlay"></div>
                <div class="content">
                    <h3>澳门励志青年会</h3>
                    <p>前端开发</p>
                    <a href="http://www.iya.mo/" class="btn-view">在线案例</a>
                </div>
            </div>
        </li>
        <li>
            <a href="http://nlp2ct.sftw.umac.mo/"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/uploads/c5.jpg" alt=""></a>
            <div class="showbox">
                <div class="overlay"></div>
                <div class="content">
                    <h3>NLP2CT</h3>
                    <p>网页设计，前端开发</p>
                    <a href="http://nlp2ct.sftw.umac.mo/" class="btn-view">在线案例</a>
                </div>s
            </div>
        </li>
        <li>
            <a href="http://www.supermasterlogistics.com/"><img src="<?= Yii::$app->request->baseUrl ?>/xinye2014/uploads/c6.jpg" alt=""></a>
            <div class="showbox">
                <div class="overlay"></div>
                <div class="content">
                    <h3>天王物流有限公司</h3>
                    <p>网页设计,前端开发,WP程序</p>
                    <a href="http://www.supermasterlogistics.com/" class="btn-view">在线案例</a>
                </div>
            </div>
        </li>
    </ul>
    <a href="case.html" class="more">查看全部</a>
</section>
<!--/home-case-->