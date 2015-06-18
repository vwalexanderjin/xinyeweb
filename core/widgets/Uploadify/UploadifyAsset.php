<?php
namespace app\core\widgets\Uploadify;
use yii\web\AssetBundle;

class UploadifyAsset extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'widgets/uploadify/uploadify.css',
    ];

    public $js = [
        'widgets/uploadify/jquery.uploadify.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}