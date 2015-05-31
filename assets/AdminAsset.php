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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'static/admin/css/common.css',
        'static/admin/css/zebra_dialog.css',
    ];
    public $js = [
        'static/js/jquery/jquery.form.js',
        'static/js/jquery/jquery.tools.min.js',
        'static/js/base.js',
        'static/js/My97DatePicker/WdatePicker.js',
        'static/js/validationEngine/jquery.validationEngine.min.js',
        'static/js/zebra_dialog/zebra_dialog.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
