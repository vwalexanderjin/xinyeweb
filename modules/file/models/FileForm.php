<?php

namespace app\modules\file\models;

use app\core\base\BaseModel;
use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $key
 * @property string $val
 */
class FileForm extends BaseModel
{
    public $content;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['key', 'val'], 'required'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'content' => Yii::t('app', 'Content'),
        ];
    }
}
