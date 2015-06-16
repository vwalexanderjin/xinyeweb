<?php

namespace app\modules\ad\models;

use Yii;

/**
 * This is the model class for table "{{%ad}}".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $mark
 * @property string $href
 * @property string $img
 * @property integer $position
 * @property string $ctime
 * @property string $utime
 * @property integer $status
 * @property integer $cid
 * @property integer $sort
 */
class Ad extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ad}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'mark', 'sort'], 'required'],
            [['position', 'ctime', 'utime', 'status', 'cid', 'sort'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['description', 'mark', 'img'], 'string', 'max' => 255],
            [['href'], 'string', 'max' => 200],
            [['img'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', '标题'),
            'description' => Yii::t('app', '描述'),
            'mark' => Yii::t('app', '备注'),
            'href' => Yii::t('app', '链接'),
            'img' => Yii::t('app', '图片'),
            'position' => Yii::t('app', '位置'),
            'ctime' => Yii::t('app', '创建时间'),
            'utime' => Yii::t('app', '更新时间'),
            'status' => Yii::t('app', '状态'),
            'cid' => Yii::t('app', '类别'),
            'sort' => Yii::t('app', '排序'),
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->ctime = $this->utime = time();
            } else {
                $this->utime = time();
            }
            return true;
        } else {
            return false;
        }
    }
}
