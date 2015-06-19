<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/10
 * Time: 14:24
 */

namespace app\core\widgets\UEditor;


use yii\web\AssetBundle;

class UEditorAsset extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'widgets/ueditor1_4_3-utf8-php/themes/default/css/ueditor.min.css',
    ];

    public $js = [
        'widgets/ueditor1_4_3-utf8-php/ueditor.config.js',
		'widgets/ueditor1_4_3-utf8-php/ueditor.all.js',
		'widgets/ueditor1_4_3-utf8-php/lang/zh-cn/zh-cn.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
} 