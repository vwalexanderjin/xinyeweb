<?php

namespace app\modules\post\controllers;

use app\core\base\backend\BackendBaseController;

class DefaultController extends BackendBaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
