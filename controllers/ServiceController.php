<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-8
 * Time: 下午11:43
 */

namespace app\controllers;


use app\core\base\BaseController;

class ServiceController extends BaseController{

    public function actionIndex () {
        return $this->render('index');
    }
}