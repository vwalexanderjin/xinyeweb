<?php

namespace app\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "{{%auth_item}}".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthRule $ruleName
 * @property AuthItemChild[] $authItemChildren
 */
//class Item extends \app\core\base\BaseActiveRecord
class Item extends \app\core\base\BaseActiveRecord
{
    public $child;
    public $updatedAt;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            ['name', 'unique', 'message' => '此名称已经存在，换一个吧'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['child'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'rule_name' => Yii::t('app', 'Rule Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(Assignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(Rule::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren()
    {
        return $this->hasMany(ItemChild::className(), ['child' => 'name']);
    }

    /**
     * @param $name 创建一个许可
     */
    public function createPermission ($name, $description) {
        $auth = Yii::$app->authManager;
//        var_dump($auth);die;
        $permission = $auth->createPermission($name);
        $permission->description = $description;
        $auth->add($permission);
    }

    /**
     * @param $name 创建一个角色
     */
    public function createRole($name,$description) {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($name);
        $role->description = $description;
        $auth->add($role);
    }

    public function beforeSave($insert) {
        if(parent::beforeSave($insert)) {
            if($insert) {
                $this->created_at = $this->updated_at = time();
            } else {
                $this->updated_at = time();
            }
        } else {
            return false;
        }
    }
}
