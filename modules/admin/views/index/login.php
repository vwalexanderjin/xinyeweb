<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Administrator');

$this->registerCss('
    body {
      padding-top: 240px;
      background-color: #eee;
    }

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="text"] {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
');
?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => [
        'class' => 'form-signin'
    ]
]); ?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $form->field($model, 'username', [
    'template' => '<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>{input}</div>{error}',
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('username'),
    ],
])->label(false);
?>
<?= $form->field($model, 'password', [
    'template' => '<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>{input}</div>{error}',
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('password'),
    ],
])->passwordInput()->label(false);
?>

<?= $form->field($model, 'verifyCode',[
    'template' => '{input}{error}'
])->widget(\yii\captcha\Captcha::className(), [
    'captchaAction'=>'/admin/index/captcha',
    'template' => '<div class="row"><div class="col-lg-6">{input}</div><div class="col-lg-6 img-rounded">{image}</div></div>',
    'imageOptions' => ['alt' => '验证码', 'style'=>'cursor:pointer; border:1px solid #ccc'],
]) ?>

<?= $form->field($model, 'rememberMe')->checkbox() ?>
<!--<div style="color:#999;margin:1em 0">
    If you forgot your password you can <?/*= Html::a('reset it', ['site/request-password-reset']) */?>.
</div>-->
<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Administrator Login'), ['class' => 'btn btn-primary btn-block btn-registration', 'name' => 'login-button']) ?>
</div>
<?php ActiveForm::end(); ?>
