<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-9
 * Time: 下午10:05
 */

namespace app\controllers;


use app\core\base\BaseController;

class ArticleController extends BaseController{

    public function actionIndex() {
        return $this->render('post/index');
    }
}