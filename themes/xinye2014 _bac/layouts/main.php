<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\OneAppAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

OneAppAsset::register($this);
$controllerId = Yii::$app->controller->id;
$actionId = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--[if IE]>
        <script src="<?= Yii::$app->request->baseUrl ?>/js/html5shiv.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>/js/respond.min.js"></script>
        <![endif]-->
        <?php $this->head() ?>
    </head>
    <body>

    <?php $this->beginBody() ?>
    <header class="header">
        <a href="index.html" class="logo"></a>
        <ul class="menu" id="menu">
            <li><a href="<?= Url::toRoute('/site/index') ?>"    <?php if ($controllerId == "site" && $actionId == "index") { ?> class="active" <?php } ?>  ><?= Yii::t('app', 'Home') ?></a></li>
            <li><a href="<?= Url::toRoute('/case/index') ?>"    <?php if ($controllerId == "case" && $actionId == "index") { ?> class="active" <?php } ?>  ><?= Yii::t('app', 'Case') ?></a></li>
            <li><a href="<?= Url::toRoute('/service/index') ?>" <?php if ($controllerId == "service" && $actionId == "index") { ?> class="active" <?php } ?> ><?= Yii::t('app', 'Service') ?></a></li>
            <li><a href="<?= Url::toRoute('/blog/index') ?>" <?php if ($controllerId == "blog" && ($actionId == "index" || $actionId == "view")) { ?> class="active" <?php } ?>><?= Yii::t('app', 'Blog') ?></a></li>
            <li><a href="<?= Url::toRoute('/site/about') ?>"    <?php if ($controllerId == "site" && $actionId == "about") { ?> class="active" <?php } ?>><?= Yii::t('app','About Us') ?></a></li>
            <li><a href="<?= Url::toRoute('/site/contact') ?>"  <?php if ($controllerId == "site" && $actionId == "contact") { ?> class="active" <?php } ?>><?= Yii::t('app','Contact Us') ?></a></li>
        </ul>
    </header>
    <!--/header-->
    <?= $content ?>
    <div class="start-pro">
        <h1><?= Yii::t('app', 'opentitle') ?></h1>
        <h3><?= Yii::t('app', 'opendes') ?></h3>
        <a href="contact.html" class="btn-contact"><?= Yii::t('app', 'Contact Us') ?></a>
    </div>
    <!--/start-pro-->
    <footer class="footer">
        <script>
            function changeLanguage(lang){
                $.cookie('language', lang);
                window.location.reload();
            }
        </script>
        <ul class="links">
            <li><a href="javascript:;" onClick="changeLanguage('en')" ><?= Yii::t('app', 'English') ?></a></li>
            <li><a href="javascript:;" onClick="changeLanguage('zh-CN')" ><?= Yii::t('app', 'Chinese') ?></a></li>
            <li><em class="icon-f-wc"></em><a href="#">xinyeweb</a></li>
            <li><em class="icon-f-email"></em><a href="mailto:xinyeweb@foxmail.com">xinyeweb@foxmail.com</a></li>
        </ul>
        <p class="copyright">&copy; Copyright 2014 Xinye All Rights Reserved .</p>
    </footer>
    <!--/footer-->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>