<?php

namespace app\modules\admin\controllers;

use app\core\base\BaseController;
use app\models\LoginForm;
use yii\helpers\Json;
use yii\web\Controller;

class IndexController extends BaseController
{

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'maxLength' => 3,
                'minLength' => 3,
                'height' => 42
            ],
        ];
    }

    public function actionLogin() {
        $this->layout = '//backend/main_nothing';
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin/default/index']);
        } else {
            return $this->render('login',[
                'model' => $model
            ]);
        }
    }

    public function actionLogout() {
        \Yii::$app->user->logout();
        return $this->redirect(['/admin/index/login']);
    }
}
