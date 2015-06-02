<?php

namespace app\modules\post\models;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_second
 * @property string $redirect_url
 * @property string $thumb
 * @property string $from
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $template
 * @property string $tags
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
            [['title', 'title_second', 'redirect_url', 'thumb', 'from', 'seo_title', 'seo_keywords', 'seo_description', 'template', 'tags', 'info', 'content'], 'required'],
            [['ishot', 'status', 'ctime', 'utime', 'cid', 'uid'], 'integer'],
            [['content'], 'string'],
            [['title', 'thumb'], 'string', 'max' => 200],
            [['title_second', 'redirect_url'], 'string', 'max' => 128],
            [['from'], 'string', 'max' => 50],
            [['seo_title', 'seo_keywords', 'seo_description'], 'string', 'max' => 80],
            [['template'], 'string', 'max' => 30],
            [['tags', 'info'], 'string', 'max' => 255],
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
            'title' => Yii::t('app', '标题'),
            'title_second' => Yii::t('app', '副标题'),
            'redirect_url' => Yii::t('app', '跳转地址'),
            'thumb' => Yii::t('app', '封面图'),
            'from' => Yii::t('app', '来源'),
            'seo_title' => Yii::t('app', 'SEO标题'),
            'seo_keywords' => Yii::t('app', 'SEO关键字'),
            'seo_description' => Yii::t('app', 'SEO描述'),
            'template' => Yii::t('app', '模板'),
            'tags' => Yii::t('app', '标签'),
            'ishot' => Yii::t('app', '推荐'),
            'status' => Yii::t('app', '状态'),
            'info' => Yii::t('app', '摘要'),
            'content' => Yii::t('app', '内容'),
            'ctime' => Yii::t('app', '发布时间'),
            'utime' => Yii::t('app', '更新时间'),
            'type' => Yii::t('app', 'type: post case ...'),
            'cid' => Yii::t('app', '分类'),
            'uid' => Yii::t('app', '作者'),
        ];
    }

    public function beforeSave($insert) {
        if(parent::beforeSave($insert)) {
            if ($insert) {
                $this->ctime = $this->utime = time();
            } else {
                $this->utime = time();
            }
            //$this->tags && $this->tags = str_replace(['，' , ', ' , ' ,',' ' ],',', $this->tags);
        } else{
            return false;
        }

    }
}
