<?php

namespace app\modules\album\models;

use Yii;

/**
 * This is the model class for table "{{%album}}".
 *
 * @property string $id
 * @property integer $album_cid
 * @property string $img
 * @property string $description
 */
class Album extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%album}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_cid'], 'integer'],
            [['img'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'album_cid' => Yii::t('app', 'Album Cid'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
