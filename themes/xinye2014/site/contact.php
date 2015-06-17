<?php
use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = Yii::t('app','Contact Us'). ' - ' . Yii::t('app','Xinyeweb');
$this->registerMetaTag(['name'=>'description','content'=>Yii::$app->params['seo_description']]);
$this->registerMetaTag(['name'=>'keywords','content'=>Yii::$app->params['seo_keywords']]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="c-banner">
    <h1 class="c-title-4"><?= Yii::t('app','Contact Us') ?></h1>
</div>
<!--/c-banner-->
<div class="c-title-2">
    <img src="<?=Yii::$app->request->baseUrl?>/web/xinye2014/images/icon-14.png" alt="">
    <h2>保持联系</h2>
</div>
<!--/c-title-2-->
<div class="contact-body">

    <div class="contact-form">
        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
            <div class="alert alert-success">
                Thank you for contacting us. We will respond to you as soon as possible.
            </div>
        <?php else: ?>
            <?php $form = ActiveForm::begin(['id' => 'contact-form',
                //'layout' => 'horizontal',
                'errorCssClass' => 'error',
                'fieldConfig' => [
                    'template' => "{input}",
//            'horizontalCssClasses' => [
//                'label' => '',
//                'offset' => '',
//                'wrapper' => '',
//                'error' => '',
//                'hint' => '',
//            ],
                ],
            ]); ?>
            <p>
                <?= $form->field($model, 'name',['options'=>['class'=>'']])->textInput(['class'=>'txt','placeholder'=>'您的名字/称谓']) ?>
                <?= $form->field($model, 'email',['options'=>['class'=>'']])->textInput(['class'=>'txt','placeholder'=>'您的Email']) ?>
                <!--<input type="text" class="txt" placeholder="您的名字/称谓">-->
                <!--<input type="text" class="txt" placeholder="您的Email">-->
            </p>
            <p>
                <?= $form->field($model, 'tel',['options'=>['class'=>'']])->textInput(['class'=>'txt','placeholder'=>'您的联系电话']) ?>
                <?= $form->field($model, 'address',['options'=>['class'=>'']])->textInput(['class'=>'txt','placeholder'=>'您的公司名称/公司网址']) ?>
                <!--<input type="text" class="txt" placeholder="您的联系电话">
                <input type="text" class="txt" placeholder="您的公司名称/公司网址">-->
            </p>
            <p>
                <?= $form->field($model, 'body',['options'=>['class'=>'']])->textarea(['class'=>'txt2','cols'=>'30','rows'=>'10','placeholder'=>'描述一下您的项目...']) ?>
                <!--<textarea name="" id="" cols="30" rows="10" class="txt2" placeholder="描述一下您的项目..."></textarea>-->
            </p>
            <p> </p>
            <p class="btn-area">
				<span class="mailing">
                    <?= $form->field($model, 'checkMail')->checkbox(['label'=>'订阅我们的官方推送邮件，了解最新优惠及服务动态。'])?>
				</span>
                <?= Html::submitButton('发送', ['class' => 'btn-send','id'=>'btn-send', 'name' => 'contact-button']) ?>
                <!--<input type="submit" class="btn-send" value="发送" id="btn-send" rel="#contact-overlay">-->
            </p>
            <?php ActiveForm::end() ?>
        <?php endif; ?>
    </div>
    <!--/contact-form-->

    <div class="contact-ways">
        <h2>珠海鑫烨网络科技有限公司</h2>
        <ul>
            <li>
                <h5>热线电话：</h5>
                <p>( +86 ) 132-4637-9698</p>
                <p>( +86 ) 135-7069-9857</p>
                <p>( +86 ) 177-0756-1655</p>
            </li>
            <li>
                <h5>电子邮件：</h5>
                <p>hello#xinyeweb.com</p>
            </li>
            <li>
                <h5>官方微信：</h5>
                <p>xinyeweb</p>
            </li>
            <li>
                <h5>官方QQ：</h5>
                <p>2478619266</p>
            </li>
        </ul>
        <figure class="qr-code"><img src="<?=Yii::$app->request->baseUrl?>/web/xinye2014/images/qr-code.png" alt=""></figure>
    </div>
    <!--/contact-ways-->
</div>
<!--/contact-body-->

<!------------------------------------------------------------------------------------------------>
<div class="site-contact">


    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                                                                                                    Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <!--<p>
            If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
        </p>-->

    <?php endif; ?>
</div>