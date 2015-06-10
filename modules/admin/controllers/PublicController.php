<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/8
 * Time: 14:10
 */

namespace app\modules\admin\controllers;


use app\core\base\backend\BackendBaseController;
use yii\web\UploadedFile;

class PublicController extends BackendBaseController{

    public function actionUploadImg($model, $attribute) {
        $file = UploadedFile::getInstance($model, $attribute);
        if ($file->saveAs('uploads/' . $file->baseName . '.' . $file->extension)) {
            //Upload OK
        } else {
            //Upload Error
        }
    }
} 