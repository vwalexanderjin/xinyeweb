<?php


namespace app\core\base;


use app\core\widgets\UEditor\UEditorAsset;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;

class BaseWidget extends Widget{

    //接收百度编辑器 umeditor.config.js的设置参数
    public $editorConfig = [];

    public function init() {
        //引入UEditor需要的静态脚本
        $this->registerClickScript();
        //初始化js脚本
        $this->registerScript();
    }

    //引入UEditor需要的静态脚本
    public function registerClickScript() {
        $view = $this->getView();
        //使用同namespace 下的UEditorAsset AssetBundle管理工具 引入UEditor客户端脚本
        UEditorAsset::register($view);
    }

    //初始化脚本
    public function registerScript() {
        $id = $this->getId();//获取挂件id
        $options = [
            'id' => $id,
            'type' => 'text/plain'
        ];
        $js = '';
        //初始化百度编辑器配置参数
        if (count($this->editorConfig) > 0) {
            foreach ($this->editorConfig as $k => $v) {
                $k = trim($k);
                $js.="window.UMEDITOR_CONFIG.{$key}='{$value}';";
            }
        }
        //百度编辑器初始化脚本
        $js .= "var um = UM.getEditor('{$id}')";
        //在页面最后引入初始化脚本
        $this->getView()->registerJs($js, View::POS_END);
        echo Html::tag('script', null, $options);
    }
}