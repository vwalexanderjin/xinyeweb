<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-5-25
 * Time: 下午11:32
 */

namespace app\modules\config\controllers;


use app\core\base\backend\BackendBaseController;
use app\modules\config\models\BasicConfig;
use app\modules\config\models\EmailConfig;
use app\modules\config\models\ThemeConfig;

class ConfigController extends BackendBaseController{

    public function actionIndex() {
        echo "111";
    }

    public function actionBasic() {
        $model = new BasicConfig();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->initValue();
            return $this->render('basic',['model' => $model]);
        }
    }

    public function actionTheme() {
        $model = new ThemeConfig();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id'=>$model->id]);
        } else {
            $model->initValue();
            return $this->render('theme',['model' => $model]);
        }
    }

    public function actionEmail() {
        $model = new EmailConfig();
        $model->getEmailParams();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->saveEmailParams();
            }
        }
        return $this->render('email', [
            'model' => $model,
        ]);
    }

}