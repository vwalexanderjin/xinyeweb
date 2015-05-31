<?php

namespace app\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "{{%auth_item_child}}".
 *
 * @property string $parent
 * @property string $child
 *
 * @property AuthItem $parent0
 * @property AuthItem $child0
 */
class ItemChild extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item_child}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('app', 'Parent'),
            'child' => Yii::t('app', 'Child'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Item::className(), ['name' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(Item::className(), ['name' => 'child']);
    }

    /**
     * @param $item
     * @return array|null|\yii\db\ActiveRecord 验证组合是否存在
     */
    public static function validated($parent, $child)
    {
        $model = ItemChild::findOne(['parent' =>$parent , 'child' => $child]);
        return $model;
    }

    /**
     * 创建授权
     */
    static public function createEmpowerment($parent, $child)
    {
        $auth = Yii::$app->authManager;

        $parent = $auth->createRole($parent);
        $child = $auth->createPermission($child);

        $auth->addChild($parent, $child);
    }
}
