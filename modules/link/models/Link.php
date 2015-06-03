<?php

namespace app\modules\link\models;

use Yii;

/**
 * This is the model class for table "{{%link}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $logo
 * @property string $href
 * @property integer $ctime
 * @property integer $utime
 * @property integer $status
 * @property integer $type
 * @property integer $cid
 * @property integer $order
 */
class Link extends \app\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%link}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['ctime', 'utime'], 'required'],
            [['ctime', 'utime', 'status', 'type', 'cid', 'order'], 'integer'],
            [['title'], 'string', 'max' => 80],
            [['logo'], 'string', 'max' => 125],
            [['href'], 'string', 'max' => 200]
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
            'logo' => Yii::t('app', 'Logo图片'),
            'href' => Yii::t('app', '链接'),
            'ctime' => Yii::t('app', '创建时间'),
            'utime' => Yii::t('app', '更新时间'),
            'status' => Yii::t('app', '状态'),
            'type' => Yii::t('app', '显示方式'),
            'cid' => Yii::t('app', '类别'),
            'order' => Yii::t('app', '排序'),
        ];
    }

    public static function status() {
        return [
            '0' => '待审核',
            '1' => '已审核',
        ];
    }

    public static function type() {
        return [
            '0' => '文字链接',
            '1' => '图片链接',
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
