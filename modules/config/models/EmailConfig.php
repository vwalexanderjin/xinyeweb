<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-5-26
 * Time: 上午12:00
 */

namespace app\modules\config\models;

use app\core\base\BaseModel;

class EmailConfig extends BaseModel{
    public $email_host;
    public $email_username;
    public $email_password;
    public $email_port;
    public $email_encryption;

    public function rules() {
        return [
            [['email_host','email_username','email_password','email_port','email_encryption'],'string']
        ];
    }

    public function attributeLabels() {
        return [
            'email_host' => '服务器',
            'email_username' => '用户名',
            'email_password' => '密码',
            'email_port' => '端口',
            'email_encryption' => '加密',
        ];
    }

    public function getEmailParams(){
        $this->email_host = \Yii::$app->params['email_host'];
        $this->email_username = \Yii::$app->params['email_username'];
        $this->email_password = \Yii::$app->params['email_password'];
        $this->email_port = \Yii::$app->params['email_port'];
        $this->email_encryption = \Yii::$app->params['email_encryption'];
    }

    public function saveEmailParams() {
        /*\Yii::$app->params['email_host'] = $this->email_host;
        \Yii::$app->params['email_username'] = $this->email_username;
        \Yii::$app->params['email_password'] = $this->email_password;
        \Yii::$app->params['email_port'] = $this->email_port;
        \Yii::$app->params['email_encryption'] = $this->email_encryption;*/
    }
}