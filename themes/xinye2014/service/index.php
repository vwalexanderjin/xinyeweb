<?php
$this->title = Yii::t('app', 'Service'). ' - ' . Yii::t('app','Xinyeweb');
$this->registerMetaTag(['name'=>'description','content'=>Yii::$app->params['seo_description']]);
$this->registerMetaTag(['name'=>'keywords','content'=>Yii::$app->params['seo_keywords']]);
?>
<div class="service-banner">
    <div class="mask"></div>
    <h1 class="c-title-3"><?= Yii::t('app', 'Service') ?></h1>
</div>
<!--/case-banner-->
<div class="c-title-2">
    <h2>为您的企业提供一站式服务</h2>
</div>
<!--/c-title-2-->
<ul class="service-list">
    <li>
        <a href="">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/images/icon-7.png" alt="">
            <h5>网站设计&amp;开发</h5>
            <p>我们热爱创造用户体验良好的网站。无论是设计，还是具有大量的创造力，我们都会将它融入到每一个项目。</p>
        </a>
    </li>
    <li>
        <a href="">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/images/icon-8.png" alt="">
            <h5>品牌/网络推广</h5>
            <p>我们知道新企业的初期推广非常艰难，于是便有了这项服务。我们将为您提供最具性价比和专业的推广服务套餐。</p>
        </a>
    </li>
    <li>
        <a href="">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/images/icon-9.png" alt="">
            <h5>微信开发</h5>
            <p>作为国内最顶尖的社交应用，专业的公众平台推广和订制开发功能服务就此展开。</p>
        </a>
    </li>
    <li>
        <a href="">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/images/icon-10.png" alt="">
            <h5>APP开发</h5>
            <p>如果您能为它命名，那么我们就可以做出来！目前支持 Android APP 平台开发。</p>
        </a>
    </li>
    <li>
        <a href="">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/images/icon-31.png" alt="">
            <h5>服务器&amp;域名</h5>
            <p>我们的托管服务简单且经济实惠。支持国内及美国最好的托管公司，我们可以提供一个快速，可靠的服务器环境。</p>
        </a>
    </li>
    <li>
        <a href="">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/images/icon-11.png" alt="">
            <h5>设计&amp;印刷品</h5>
            <p>我们还可以帮助您设计和打印印刷品。包括名片，品牌LOGO设计，传单及宣传海报。我们的专家时刻都在准备着。</p>
        </a>
    </li>
    <li>
        <a href="">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/images/icon-12.png" alt="">
            <h5>网店 &amp; 电子商务</h5>
            <p>电子商务成为了当今商人们最喜爱的营销策略之一。我们可以帮您建立美观，用户体验良好的购物平台。提供淘宝网店服务支持。</p>
        </a>
    </li>
    <li>
        <a href="">
            <img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/images/icon-13.png" alt="">
            <h5>免费获取报价单</h5>
            <p>如果您想制作一个网站项目，但是您却缺少技术支持或创意想法，那么不要犹豫与我们取得联系。</p>
        </a>
    </li>
</ul>