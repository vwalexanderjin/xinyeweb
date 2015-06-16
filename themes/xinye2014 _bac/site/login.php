<?php
use yii\helpers\Html;
\app\assets\AppAsset::register($this);
$this->registerCssFile(Yii::$app->request->baseUrl."@web/home/css/reset.css");
$this->registerCssFile(Yii::$app->request->baseUrl."@web/home/css/style.css");
$this->registerCssFile(Yii::$app->request->baseUrl."@web/home/css/da-slider.css");
$this->registerCssFile(Yii::$app->request->baseUrl."@web/home/css/responsive.css");
//$this->registerCssFile(Yii::$app->request->baseUrl."@web/home/css/bootstrap.min.css");
//$this->registerJsFile(Yii::$app->request->baseUrl."@web/web/js/masonry.pkgd.min.js", ['depends' => [yii\web\JqueryAsset::className()]]);
//$this->registerJsFile(Yii::$app->request->baseUrl."@web/web/js/bootstrap.min.js", ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl."@web/web/js/modernizr.custom.28468.js", ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl."@web/web/js/jquery.cslider.js", ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl."@web/web/js/jquery.slicknav.min.js", ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl."@web/web/js/common.js", ['depends' => [yii\web\JqueryAsset::className()]]);
?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="鑫烨网络科技有限公司,品牌推广,网络推广,网页设计,APP程式设计,微信开发">
        <meta name="description" content="欢迎来到鑫烨，鑫烨是总部位于中国珠海的一家现代网络产品和设计公司。我们专注于品牌推广，网络推广，网页设计，APP程式设计，微信开发。我们是一个充满活力和决心的团队，致力于帮助您的企业或个人获得成功。">
        <title>鑫烨网络</title>
        <?php $this->head() ?>
        <!--[if IE]>
        <?php
    $this->registerJsFile(Yii::$app->request->baseUrl."@web/home/js/html5shiv.js");
        $this->registerJsFile(Yii::$app->request->baseUrl."@web/home/js/respond.min.js");
        ?>
        <![endif]-->
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="member">
        <div class="header-member">
            <a href="http://www.xinyeweb.com" class="logo" title="鑫烨网络"></a>
        </div>
        <!--/header-member-->
        <div class="c-title-2">
            <h2>一个账户，畅享鑫烨所有服务！</h2>
            <p>现在登录您的鑫烨账户</p>
        </div>
        <!--/c-title-2-->
        <div class="u-signin">
            <?php $form = \yii\widgets\ActiveForm::begin([
                //'enableAjaxValidation' => true,
                //'enableClientScript'=> true,
                //'options' => [],
                //'fieldClass'=>'',
                'fieldConfig' => ['template'=>"{input}",'options'=>['class'=>'']],
                'errorCssClass'=>'error'
                //'validateOnBlur' => true,
            ]); ?>
            <ul class="u-form pull-left">
                <li>
                    <?=$form->field($model,'username')->textInput(['class'=>'txt-1','placeholder'=>'用户名'])?>
                </li>
                <li>
                    <?=$form->field($model,'password')->passwordInput(['class'=>'txt-1','placeholder'=>'密码'])?>
                </li>
                <li>
                    <?//=$form->field($model,'captcha')->textInput(['class'=>'txt-2','placeholder'=>'验证码','style'=>'width:140px'])?>
                    <?=Html::activeTextInput($model,'captcha',['class'=>'txt-2','placeholder'=>'验证码'])?>
                    <span class="verify-code">
                        <?=$form->field($model,'captcha')->widget(\yii\captcha\Captcha::className(),[
                            'template' => '{image}',
                            'imageOptions' => ['alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'],
                        ])?>
                        <?php //$this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'))) ?>
					</span>
                </li>
                <li>
                    <?=Html::submitButton('登录',['class' => 'btn-go']) ?>
                </li>
                <li>
					<span class="func pull-left">
                    <?=Html::activeCheckbox($model,'rememberMe',['checked'=>'checked','label'=>'一个月内免登陆'])?>
                    <?=Html::a('注册账户',['site/register'],['class'=>'link-signup pull-right']);?>
                </li>
            </ul>
            <!--/u-form-->
            <?php \yii\widgets\ActiveForm::end(); ?>
            <div class="u-signin-ways pull-right">
                <h3>使用QQ或新浪微博登录</h3>
                <ul class="list">
                    <li><?=Html::a('',['oauth/qq'],['class'=>'icon-qq','title'=>'QQ登录'])?></li>
                    <li><?=Html::a('',['oauth/wb'],['class'=>'icon-wb','title'=>'新浪微博'])?></li>
                </ul>
            </div>
            <!--/u-signin-ways-->
        </div>
        <!--/u-signin-->
        <footer class="footer-member">
            <div class="link">
                <a href="mailto:xinyeweb@foxmail.com">xinyeweb@foxmail.com</a>
            </div>
            <div class="copyright">&copy; Copyright 2014 Xinye All Rights Reserved</div>
        </footer>
        <!--/footer-member-->
    </div>
    <!--/member-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>