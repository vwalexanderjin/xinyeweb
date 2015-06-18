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

    public function actionClearCache() {
        return $this->render('clear_cache');
    }


    public function actionClear() {
        if (\Yii::$app->request->isAjax) {
            if (\Yii::$app->cache->flush()) {
                $data['state'] = 'success';
                $data['message'] = '清理完成';
            } else {
                $data['state'] = 'error';
                $data['message'] = '清理失败';
            }
            echo json_encode($data);
        }
    }
} 