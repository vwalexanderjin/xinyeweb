<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class OneAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'xinye2014/css/reset.css',
        'xinye2014/css/bootstrap.min.css',
        'xinye2014/css/style.css',
        'xinye2014/css/da-slider.css',
        'xinye2014/css/responsive.css'
    ];
    public $js = [
        'xinye2014/js/bootstrap.min.js',
        'xinye2014/js/modernizr.custom.28468.js',
        'xinye2014/js/jquery.cslider.js',
        'xinye2014/js/jquery.slicknav.min.js',
        'xinye2014/js/common.js',
        'xinye2014/js/jquery.cookie.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
