<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-11
 * Time: 下午10:30
 */

namespace app\modules\test\controllers;


use app\core\base\backend\BackendBaseController;

class LogController extends BackendBaseController{

    public function actionIndex() {
        //log 的使用
        \Yii::log($message,$level,$category);
        \Yii::trace();
        //log trace 是保存在內存中的
    }
}