<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-8
 * Time: 下午11:39
 */

namespace app\controllers;



use app\core\base\BaseController;

class CaseController extends BaseController{

    public function actionIndex() {
        return $this->render('index');
    }
}