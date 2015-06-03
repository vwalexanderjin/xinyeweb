<?php

namespace app\modules\comment\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $uid
 * @property integer $pid
 * @property string $con
 * @property integer $ctime
 * @property integer $utime
 * @property integer $status
 */
class Comment extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'pid', 'con', 'ctime', 'utime'], 'required'],
            [['post_id', 'uid', 'pid', 'ctime', 'utime', 'status'], 'integer'],
            [['con'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_id' => Yii::t('app', '文章id'),
            'uid' => Yii::t('app', '用户id'),
            'pid' => Yii::t('app', '上级id'),
            'con' => Yii::t('app', 'Con'),
            'ctime' => Yii::t('app', 'Ctime'),
            'utime' => Yii::t('app', 'Utime'),
            'status' => Yii::t('app', '1通过 0 未通过'),
        ];
    }
}
