<?php

namespace app\core\widgets\UEditor;
use app\core\base\BaseWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\InputWidget;
use yii\web\View;

class UEditor extends InputWidget{
    public $editorConfig = [];//接收umeditor.config.js的设置参数
    public $_options;
    public function init() {
        $this->_options = [
            'initialFrameWidth' => '100%',
            'initialFrameHeight' => '400',
            'lang' => (strtolower(\Yii::$app->language) == 'en-us') ? 'en' : 'zh-cn',
        ];
        $this->editorConfig = count($this->editorConfig)>0 ? ArrayHelper::merge($this->_options, $this->_options) : $this->_options;
        //引入UEditor需要的静态脚本
        $this->registerClickScript();
        //UEditor初始化js脚本
        //$this->registerScript();
    }

    /**
     * 引入UEditor需要的静态脚本
     */
    public function registerClickScript()
    {
        $view = $this->getView();
        //使用同namespace 下的UEditorAsset AssetBundle管理工具 引入UEditor客户端脚本
        UEditorAsset::register($view);

    }

    /**
     * 初始化js脚本
     */
    public function registerScript(){
        $id = $this->getId(); //获取挂件id
        $options = [
            'id'=>$id,
            'type'=>'text/plain',
        ];
        $js = '';
        //初始化百度编辑器配置参数
        foreach($this->editorConfig as $key=>$value){
            $key = trim($key);
            $js .= "window.UMEDITOR_CONFIG.{$key}='{$value}';";
        }
        //百度编辑器初始化脚本
        $js .= "var um = UM.getEditor('{$id}');";
        //在页面最后引入初始化脚本
        $this->getView()->registerJs($js,View::POS_END);
        //echo Html::tag('script',null,$options);//这里由run方法替换了
    }

    public function run() {
        $this->registerScript();
        if ($this->hasModel()) {
            return Html::activeTextarea($this->model, $this->attribute, ['id' => $this->id]);
        } else {
            return Html::textarea($this->id, $this->value, ['id' => $this->id]);
        }
    }

} 