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
use app\modules\file\models\FileForm;

class FileController extends BackendBaseController{


    public function actionIndex() {
        $defaultPath =  \Yii::getAlias('./../themes/xinye2014');
        $path = \Yii::$app->request->get('path', $defaultPath);
        $directory = Dir::readDirectory($path);
        return $this->render('index',[
            'path'=>$path,
            'directory'=>$directory
        ]);
    }

    public function actionEdit($filename) {
        $content = file_get_contents($filename);
        $model = new FileForm();
        $model->content = $content;
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                file_put_contents($filename, $model->content);
                return $this->redirect(['index']);
            }
        }

        return $this->render('_form', [
            'filename' => $filename,
            'model' => $model,
        ]);
    }
}