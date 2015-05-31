<?php

namespace app\modules\post\models;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $thumb
 * @property string $from
 * @property integer $ishot
 * @property integer $status
 * @property string $info
 * @property string $content
 * @property integer $ctime
 * @property integer $utime
 * @property string $type
 * @property integer $cid
 * @property integer $uid
 */
class Post extends \app\core\base\BaseActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'thumb', 'from', 'info', 'content', 'ctime', 'utime'], 'required'],
            [['ishot', 'status', 'ctime', 'utime', 'cid', 'uid'], 'integer'],
            [['content'], 'string'],
            [['title', 'thumb'], 'string', 'max' => 200],
            [['from'], 'string', 'max' => 50],
            [['info'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'thumb' => Yii::t('app', 'Thumb'),
            'from' => Yii::t('app', 'From'),
            'ishot' => Yii::t('app', '1,推荐   0,正常'),
            'status' => Yii::t('app', '1,发布,   0存档'),
            'info' => Yii::t('app', 'Info'),
            'content' => Yii::t('app', 'Content'),
            'ctime' => Yii::t('app', 'Ctime'),
            'utime' => Yii::t('app', 'Utime'),
            'type' => Yii::t('app', 'type: post case ...'),
            'cid' => Yii::t('app', '分类id'),
            'uid' => Yii::t('app', '作者id'),
        ];
    }
}
