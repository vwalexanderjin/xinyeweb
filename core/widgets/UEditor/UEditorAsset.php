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
        'widgets/umeditor1_2_2-utf8-php/themes/default/css/umeditor.min.css',
    ];

    public $js = [
        'widgets/umeditor1_2_2-utf8-php/umeditor.config.js',
		'widgets/umeditor1_2_2-utf8-php/umeditor.min.js',
		'widgets/umeditor1_2_2-utf8-php/lang/zh-cn/zh-cn.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
} 