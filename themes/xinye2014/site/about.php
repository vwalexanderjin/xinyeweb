<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'About Us'). ' - ' . Yii::t('app','Xinyeweb');
$this->registerMetaTag(['name'=>'description','content'=>Yii::$app->params['seo_description']]);
$this->registerMetaTag(['name'=>'keywords','content'=>Yii::$app->params['seo_keywords']]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="c-banner">
    <h1 class="c-title-4"><?= Yii::t('app', 'About Us')?></h1>
</div>
<!--/c-banner-->
<div class="c-title-2">
    <img src="<?=Yii::$app->request->baseUrl?>/web/xinye2014/images/icon-14.png" alt="">
</div>
<!--/c-title-2-->
<div class="about-info">
    <figure><img src="<?=Yii::$app->request->baseUrl?>/web/xinye2014/images/pic-5.png" alt=""></figure>
    <div class="content">
        <p>鑫烨是总部位于中国珠海的一家现代网络产品和设计公司。凭借多年的行业经验，组成了被客户认可，并且对互联网有着强烈激情的团队。我们所有的项目都按照行业标准来完成。</p>
        <p>我们的经验和工作方法确保我们的网站设计，开发和优化超越客户的期望值。在国内，我们所有的工作都由我们自己来完成，绝不外包。这意味着您可以始终与我们保持联络，并且为您的项目提供有效的维护与更新。</p>
        <p>我们坚信，与我们客户保持持久的关系，最重要的是“诚信”。</p>
        <p>我们不会一直用专业术语去向你的思维进行轰炸。我们会用您能理解的日常语言引导您了解工作中的每一步。从最初接手您的项目，到最后项目上线。</p>
        <p>有提到我们真的是一群很棒的家伙吗？请联系我们吧！</p>
    </div>
</div>
<!--/about-info-->
<div class="c-title-2">
    <img src="<?=Yii::$app->request->baseUrl?>/web/xinye2014/images/icon-14.png" alt="">
    <h2>为何选择我们？</h2>
    <p>是什么让我们从竞争中脱颖而出</p>
</div>
<!--/c-title-2-->
<div class="about-goods">
    <ul class="item">
        <li>
            <h5>经验</h5>
            <p>我们有超过8年的业界经验。</p>
        </li>
        <li>
            <h5>响应式</h5>
            <p>2014年开始，我们所有的网站都将采用响应布局为标准。因此，他们在不同的设备中依然完美。</p>
        </li>
        <li>
            <h5>免费的东东</h5>
            <p>新用户注册网站享有一年免费域名及虚拟主机。</p>
        </li>
    </ul>
    <ul class="item">
        <li>
            <h5>优化</h5>
            <p>我们优化每一个网站在所有主要的搜索引擎中找到。</p>
        </li>
        <li>
            <h5>高效</h5>
            <p>每一个网站都进行W3C认证HTML与CSS。保证代码标准化。</p>
        </li>
        <li>
            <h5>维护</h5>
            <p>我们设有定期维护。确保您的站点畅通无阻。</p>
        </li>
    </ul>
    <ul class="item">
        <li>
            <h5>诚信</h5>
            <p>无任何隐藏费用。我们的服务都为定金+一次性收费。价格合理。</p>
        </li>
        <li>
            <h5>培养自己</h5>
            <p>我们会持续监控，审查和改进我们网站的性能。</p>
        </li>
        <li>
            <h5>乐于助人</h5>
            <p>我们的设计师在提供优质的在线咨询服务。我们与客户讲“中文”，而不是C语言。</p>
        </li>
    </ul>
</div>
<!--/about-goods-->
<div class="c-title-2">
    <h2>没错，我们热爱我们的工作！</h2>
    <p>不断的学习，不断的创新。</p>
</div>
<!--/c-title-2-->
<div class="about-team">
    <div class="item">
        <figure class="avatar-jason"></figure>
        <h2>Jason Kim</h2>
        <div class="dowhat">创意总监&amp;联合创办人</div>
        <div class="hobby">
            喜欢和设计有关的东西。开启谷歌浏览器是每天打开电脑要做的第一件事情。热爱山地自行车，跑步。作为鑫烨联合创办人，表示深感荣幸！
        </div>
        <span class="arrow-top"></span>
        <div class="mailme">
            <a href="mailto:jason.jin@xinyeweb.com" class="link-mail">jason.jin#xinyeweb.com</a>
        </div>
    </div>
    <!--/jason-->
    <div class="item">
        <figure class="avatar-hoter"></figure>
        <h2>Hoter Zhang</h2>
        <div class="dowhat">技术总监&amp;联合创办人</div>
        <div class="hobby">
            陶醉于程序开发，甚至到了痴迷的程度。对PHP，APP开发有着自己独到的见解。且对新技术保持着不断的探索。热爱篮球，游泳。“如果代码能改变世界，我会去做到！”
        </div>
        <span class="arrow-top"></span>
        <div class="mailme">
            <a href="mailto:hoter.zhang@xinyeweb.com" class="link-mail">hoter.zhang#xinyeweb.com</a>
        </div>
    </div>
    <!--/hoter-->
</div>
<!--/about-team-->
