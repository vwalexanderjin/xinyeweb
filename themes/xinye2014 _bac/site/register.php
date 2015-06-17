<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="鑫烨网络科技有限公司,品牌推广,网络推广,网页设计,APP程式设计,微信开发">
    <meta name="description" content="欢迎来到鑫烨，鑫烨是总部位于中国珠海的一家现代网络产品和设计公司。我们专注于品牌推广，网络推广，网页设计，APP程式设计，微信开发。我们是一个充满活力和决心的团队，致力于帮助您的企业或个人获得成功。">
    <title>鑫烨网络</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/reset.css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/da-slider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/responsive.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if IE]>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="member">
    <div class="header-member">
        <a href="http://www.xinyeweb.com" class="logo pull-left mr-l-20" title="鑫烨网络"></a>
        <a href="<?php echo $this->createUrl('/user/login') ?>" class="btn-signin pull-right">登录</a>
    </div>
    <!--/header-member-->
    <div class="c-title-2">
        <h2>创建您的鑫烨账户</h2>
    </div>
    <!--/c-title-2-->
    <div class="u-signup">
        <div class="signup-info pull-left">
            <div class="item">
                <h3>一个账户，让您的商务更灵活</h3>
                <p>只需一组用户名和密码，即可畅享鑫烨所有相关产品服务</p>
                <figure><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/images/signup.png" alt=""></figure>
            </div>
            <div class="item">
                <h3>随时随地使用</h3>
                <p>支持移动终端、台式机与平板电脑。我们无处不在。</p>
                <figure><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/images/signup2.png" alt=""></figure>
            </div>
        </div>
        <!--/signup-info-->
        <?php $form = $this->beginWidget(
            'CActiveForm',array('id'=>'register-form',
            'enableAjaxValidation'=>true,
            'enableClientValidation'=> true,
            'action'=>array('user/register'),
            'clientOptions' => array(
                'validateOnSubmit'	=> true,
            ),
        )) ?>
        <ul class="u-form pull-right">
            <?php echo $form->hiddenField($userModel, 'qq_oauth', array('value'=>$open_id)) ?>
            <li>
                <label for="">用户名</label>
                <?php echo $form->textField($userModel, 'username', array('class'=>'txt-1','placeholder'=>'')) ?>
            </li>
            <li>
                <label for="">昵称</label>
                <?php echo $form->textField($userModel, 'nickname', array('class'=>'txt-1','placeholder'=>'', 'value'=>$qq_info['nickname'])) ?>
            </li>
            <li>
                <label for="">设置密码</label>
                <?php echo $form->passwordField($userModel, 'password', array('class'=>'txt-1','placeholder'=>'')) ?>
            </li>
            <li>
                <label for="">确认密码</label>
                <?php echo $form->passwordField($userModel, 'password1', array('class'=>'txt-1','placeholder'=>'')) ?>
            </li>
            <li>
                <label for="">电子邮件地址</label>
                <?php echo $form->textField($userModel, 'email', array('class'=>'txt-1','placeholder'=>'')) ?>
            </li>
            <li>
                <label for="">验证码</label>
                <?php echo $form->textField($userModel, 'captcha', array('class'=>'txt-2','placeholder'=>'')) ?>
                <span class="verify-code">
						<?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'))) ?>
					</span>
            </li>
            <li>
					<span class="func">
						<?php echo $form->checkBox($userModel, 'agree') ?>
                        我同意鑫烨 <a href="#">服务条款及隐私权政策</a>
					</span>
            </li>
            <li>
                <?php echo CHtml::submitButton('提交',array('class'=>'btn-go')) ?>
            </li>
            <li class="func-2">
                已有账户？<a href="<?php echo $this->createUrl('/user/login') ?>">点击此处登录</a>
            </li>
        </ul>
        <!--/u-form-->
        <?php $this->endWidget() ?>
    </div>
    <!--/c-login-->
    <footer class="footer-member">
        <div class="link">
            <a href="mailto:xinyeweb@foxmail.com">xinyeweb@foxmail.com</a>
        </div>
        <div class="copyright">&copy; Copyright 2014 Xinye All Rights Reserved</div>
    </footer>
    <!--/footer-member-->
</div>
<!--/member-->

<?php
if (Yii::app()->user->hasFlash('failed')) {
    $message = Yii::app()->user->getFlash('failed');
    $this->widget('ext.toastMessage.toastMessageWidget',
        array('message'=>$message,'type'=>'warning','options'=>array('position'=>'middle-center')));
}
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/modernizr.custom.28468.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/jquery.cslider.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/jquery.slicknav.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/common.js"></script>
</body>
</html>