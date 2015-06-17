<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-5-26
 * Time: 上午12:00
 */

namespace app\modules\config\models;


use app\modules\file\components\Dir;

class ThemeConfig extends BaseConfig{
    public $sys_site_theme;

    public function rules() {
        return [
            [['sys_site_theme'],'string']
        ];
    }

    public function attributeLabels() {
        return [
            'sys_site_theme' => '主题'
        ];
    }

    public function initValue() {
        parent::initAllInternal();
    }

    public function save() {
        parent::saveAll();
    }

    public static function getThemes() {
        $themePath = \Yii::getAlias('./../themes');
        return Dir::readDirectory($themePath)['dir'];
    }
}