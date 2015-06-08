<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-8
 * Time: 下午11:49
 */

namespace app\controllers;


use app\core\base\BaseController;

class PostController extends BaseController{

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionView() {
        return $this->render('view');
    }
}