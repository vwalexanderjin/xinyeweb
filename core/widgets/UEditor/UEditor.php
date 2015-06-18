<?php

namespace app\core\widgets\UEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\InputWidget;
use yii\web\View;

class UEditor extends InputWidget{
    public $editorConfig = [];//umeditor.config.js
    public $_options;
    public function init() {
        $this->_options = [
            'initialFrameWidth' => '100%',
            'initialFrameHeight' => '400',
            'lang' => (strtolower(\Yii::$app->language) == 'en-us') ? 'en' : 'zh-cn',
        ];
        $this->editorConfig = count($this->editorConfig)>0 ? ArrayHelper::merge($this->_options, $this->_options) : $this->_options;
        //
        $this->registerClickScript();
        //UEditor
        //$this->registerScript();
    }

    /**
     * ����UEditor��Ҫ�ľ�̬�ű�
     */
    public function registerClickScript()
    {
        $view = $this->getView();
        //ͬnamespace UEditorAsset AssetBundlUEdito
        UEditorAsset::register($view);

    }

    /**
     *
     */
    public function registerScript(){
        $id = $this->getId(); //
        $options = [
            'id'=>$id,
            'type'=>'text/plain',
        ];
        $js = '';
        //
        foreach($this->editorConfig as $key=>$value){
            $key = trim($key);
            $js .= "window.UMEDITOR_CONFIG.{$key}='{$value}';";
        }
        //
        $js .= "var um = UM.getEditor('{$id}');";
        //
        $this->getView()->registerJs($js,View::POS_END);
        //echo Html::tag('script',null,$options);//
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