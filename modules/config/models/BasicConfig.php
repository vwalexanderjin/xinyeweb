<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-5-26
 * Time: 上午12:00
 */

namespace app\modules\config\models;


class BasicConfig extends BaseConfig{

    public $sys_site_name;
    public $sys_site_description;
    public $sys_site_url;
    public $sys_site_email;
    public $sys_allow_register;
    public $sys_default_role;
    public $sys_utc;
    public $sys_date_format;
    public $sys_date_format_custom;
    public $sys_time_format;
    public $sys_time_format_custom;
    public $sys_lang;
    public $sys_icp;
    public $sys_stat;

    public function rules () {
        return [
            [['sys_site_name','sys_site_description','sys_site_url','sys_default_role','sys_utc','sys_date_format','sys_date_format_custom',
            'sys_time_format','sys_time_format_custom','sys_lang','sys_icp','sys_stat'],'string'],
            [['sys_allow_register'],'boolean'],
            [['sys_site_email'],'email'],
        ];
    }

    public function attributeLabels() {
        return [
            'sys_site_name' => '网站名称',
            'sys_site_description' => '网站描述',
            'sys_site_url' => '网站URL',
            'sys_site_email' => '网站EMAIL',
            'sys_allow_register' => '允许注册',
            'sys_default_role' =>'默认角色',
            'sys_utc' => '时区',
            'sys_date_format' => '日期格式',
            'sys_date_format_custom' => '自定义日期格式',
            'sys_time_format'=>'时间格式',
            'sys_time_format_custom' => '自定义时间格式',
            'sys_lang' => '站点语言',
            'sys_icp'=>'备案号',
            'sys_stat' => '统计代码'
        ];
    }

    public function initValue() {
        parent::initAllInternal();
    }

    public function save() {
        parent::saveAll();
    }
}