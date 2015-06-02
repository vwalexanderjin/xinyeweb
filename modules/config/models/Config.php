<?php

namespace app\modules\config\models;

use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $key
 * @property string $val
 */
class Config extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['key', 'val'], 'required'],
            [['key'], 'required'],
            [['key'], 'string', 'max' => 50],
            [['val'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => Yii::t('app', 'Key'),
            'val' => Yii::t('app', 'Val'),
        ];
    }
}
