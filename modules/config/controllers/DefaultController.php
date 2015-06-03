<?php

namespace app\modules\config\controllers;

use app\core\base\backend\BackendBaseController;
use yii\web\Controller;

class DefaultController extends BackendBaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
