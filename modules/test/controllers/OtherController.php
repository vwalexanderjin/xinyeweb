<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-11
 * Time: 下午10:41
 */

namespace app\modules\test\controllers;


use app\core\base\backend\BackendBaseController;

class OtherController extends BackendBaseController{

    public function actionPicker() {
        return $this->render('picker');
    }
}