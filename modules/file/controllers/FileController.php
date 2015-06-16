<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-16
 * Time: 下午11:07
 */

namespace app\modules\file\controllers;


use app\core\base\backend\BackendBaseController;
use app\modules\file\components\Dir;

class FileController extends BackendBaseController{


    public function actionIndex() {
        $path =  \Yii::getAlias('./../themes/xinye2014');
        $directory = Dir::readDirectory($path);
        return $this->render('index',[
            'path'=>$path,
            'directory'=>$directory
        ]);
    }

    public static function getFileIcon() {

    }
}