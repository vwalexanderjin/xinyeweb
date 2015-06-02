<?php

namespace app\modules\category\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $name
 * @property string $description
 * @property string $module
 * @property string $url
 */
class Category extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'name', 'description', 'module', 'url'], 'required'],
            [['pid'], 'integer'],
            [['name', 'module'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 128],
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pid' => Yii::t('app', '父类'),
            'name' => Yii::t('app', '分类名称'),
            'description' => Yii::t('app', '分类描述'),
            'module' => Yii::t('app', '模型'),
            'url' => Yii::t('app', '外链'),
        ];
    }

    public static function getCateList($module = null) {//获取按module查询的结果
        if ($module != null) {
            return Category::find()->andWhere(['module'=>$module])->all();
        } else {
            return Category::find()->all();
        }
    }
}
