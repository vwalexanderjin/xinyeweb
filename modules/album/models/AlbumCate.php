<?php

namespace app\modules\album\models;

use Yii;

/**
 * This is the model class for table "{{%album_cate}}".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property integer $ctime
 */
class AlbumCate extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%album_cate}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'ctime'], 'required'],
            [['ctime'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '相册名称'),
            'description' => Yii::t('app', '相册描述'),
            'ctime' => Yii::t('app', '创建时间'),
        ];
    }

}
