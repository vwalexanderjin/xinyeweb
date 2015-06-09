<?php

namespace app\controllers;


use app\core\base\BaseController;

class ServiceController extends BaseController{

    public function actionIndex () {
        return $this->render('index');
    }
}