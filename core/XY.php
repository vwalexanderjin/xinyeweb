<?php
namespace app\core;
class XY extends \yii\web\Application{
    public static function baseUrl () {
        return \Yii::$app->request->baseUrl;
    }
}