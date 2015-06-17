<?php
$this->title = Yii::t('app','Case'). ' - ' . Yii::t('app','Xinyeweb');
$this->registerMetaTag(['name'=>'description','content'=>Yii::$app->params['seo_description']]);
$this->registerMetaTag(['name'=>'keywords','content'=>Yii::$app->params['seo_keywords']]);
?>
<div class="case-banner">
    <div class="mask"></div>
    <h1 class="c-title-3"><?= Yii::t('app', 'Case') ?></h1>
</div>
<!--/case-banner-->
<ul class="case-list">
    <li>
        <div class="inner">
            <h1>干啥</h1>
            <figure><img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/uploads/c1-mid.png" alt=""></figure>
            <p>管理你的能量而不是时间！大学生日程管理必备APP。干啥是一款管理和优化日程的软件，通过将工作和休闲的巧妙转换来塑造健康的生活状态，让你爱上生活，爱上学习！</p>
            <a href="#" class="btn-visit">访问站点</a>
        </div>
    </li>
    <li>
        <div class="inner type2">
            <h1>南方风尚</h1>
            <figure><img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/uploads/c2-mid.png" alt=""></figure>
            <p>南方电视台向来提供多元的综艺资讯节目，旨在为广大的华南地区观众得到更多最新、最快的信息。让观众寓娱乐于收获。</p>
            <a href="#" class="btn-visit">访问站点</a>
        </div>
    </li>
    <li>
        <div class="inner">
            <h1>茶也</h1>
            <figure><img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/uploads/c3-mid.png" alt=""></figure>
            <p>淘宝店铺与电子商务的综合性在线茶具产品商城。产品包括茶具，古玩，文房道具，瓷器，茶叶，古籍善本，盆景花盆，文房清玩等。热爱古玩及茶周边的人士最爱。</p>
            <a href="#" class="btn-visit">访问站点</a>
        </div>
    </li>
    <li>
        <div class="inner type2">
            <h1>澳门励志青年会</h1>
            <figure><img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/uploads/c4-mid.png" alt=""></figure>
            <p>青年人是澳门繁荣的基石，更是社会未来的栋梁。为了使本土的经济优势得以延续，迈向更多元化的发展，积极培育年青一代乃刻不容缓。</p>
            <a href="#" class="btn-visit">访问站点</a>
        </div>
    </li>
    <li>
        <div class="inner">
            <h1>NLP2CT</h1>
            <figure><img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/uploads/c5-mid.png" alt=""></figure>
            <p>自然语言处理与中葡机器翻译实验室</p>
            <a href="#" class="btn-visit">访问站点</a>
        </div>
    </li>
    <li>
        <div class="inner type2">
            <h1>天王物流</h1>
            <figure><img src="<?= Yii::$app->request->baseUrl ?>/web/xinye2014/uploads/c6-mid.png" alt=""></figure>
            <p>天王物流有限公司是澳门的一家专业物流公司。主营：仓储配送，中澳货运，港澳货运，搬家及写字楼。中港澳货运通，天王令你运货更轻松。</p>
            <a href="#" class="btn-visit">访问站点</a>
        </div>
    </li>
</ul>
<!--/case-list-->