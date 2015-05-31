<?php

namespace app\modules\rbac\models;

use app\modules\user\models\User;
use Yii;

/**
 * This is the model class for table "{{%auth_assignment}}".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 *
 * @property AuthItem $itemName
 */
class Assignment extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => Yii::t('app', 'Item Name'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }

    /*public function getUserName() {
        return $this->hasOne(User::className(),['id','user_id']);
    }*/

    /**
     * @param $item_name
     * @param $user_id
     * @return array|null|\yii\db\ActiveRecord|static 验证角色许可是否已经存在
     */
    public static function validated($item_name, $user_id) {
        $model = Assignment::findOne(['item_name'=>$item_name, 'user_id'=>$user_id]);
        return $model;
    }

    public static function assign($item_name, $user_id) {
        $auth = Yii::$app->authManager;
        $reader = $auth->createRole($item_name);
        $auth->assign($reader, $user_id);
    }
}
