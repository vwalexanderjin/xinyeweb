<?php

namespace app\modules\file\controllers;

use app\core\base\backend\BackendBaseController;
use app\modules\file\components\Dir;
use yii\web\Controller;

class DefaultController extends BackendBaseController
{
    public function actionIndex()
    {
       echo $path =  \Yii::$app->request->baseUrl."css/";
        $directory = Dir::readDirectory($path);
        print_r($directory);
        //return $this->render('index');
    }
}
