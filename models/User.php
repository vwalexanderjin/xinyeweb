<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $password_hash
 * @property string $qq_oauth
 * @property string $wb_oauth
 * @property string $accesstoken
 * @property string $auth_key
 * @property integer $createtime
 * @property string $nickname
 * @property string $email
 * @property string $face
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accesstoken', 'auth_key', 'createtime'], 'required'],
            [['createtime'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password','password_hash', 'qq_oauth', 'wb_oauth'], 'string', 'max' => 32],
            [['accesstoken', 'authkey'], 'string', 'max' => 200],
            [['nickname'], 'string', 'max' => 12],
            [['email', 'face'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'qq_oauth' => Yii::t('app', 'Qq Oauth'),
            'wb_oauth' => Yii::t('app', 'Wb Oauth'),
            'accesstoken' => Yii::t('app', 'Accesstoken'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'createtime' => Yii::t('app', 'Createtime'),
            'nickname' => Yii::t('app', 'Nickname'),
            'email' => Yii::t('app', 'Email'),
            'face' => Yii::t('app', 'Face'),
        ];
    }

    /**
     * 实现Identity方法
     */

    public static function findIdentity ($id) {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {

    }

    public function getId () {
        return $this->id;
    }

    public function getAuthKey () {
        return $this->auth_key;
    }

    public function validateAuthKey ($authKey) {
        return $this->auth_key = $authKey;
    }

    /**
     * 自定义方法
     */

    public function validatePassword ($password) {
        return $this->password === md5($password);
        //方法二
        //return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    public static function findByUsername ($username) {
        return static::findOne(['username'=>$username]);
    }
}