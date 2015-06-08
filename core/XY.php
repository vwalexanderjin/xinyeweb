<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-8
 * Time: 下午11:12
 */
namespace app\core;
class XY extends \yii\web\Application{
    public static function baseUrl () {
        return \Yii::$app->request->baseUrl;
    }
}