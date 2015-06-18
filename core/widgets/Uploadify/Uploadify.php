<?php
namespace app\core\widgets\Uploadify;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\InputWidget;

class Uploadify extends InputWidget{

    /**
     * $form->field($model, 'logo')->widget(\app\core\widgets\Uploadify\Uploadify::className(),['jsOptions'=>['height'=>30],'url'=>\yii\helpers\Url::to(['admin/upload'])])
     */
    public $url;
    public $jsOptions=[];
    public $events=[
        'onCancel', 'onClearQueue', 'onDestroy', 'onDialogClose', 'onDialogOpen',
        'onDisable', 'onEnable', 'onFallback', 'onInit', 'onQueueComplete',
        'onSelect', 'onSelectError', 'onSWFReady', 'onUploadComplete',
        'onUploadError', 'onUploadProgress', 'onUploadStart', 'onUploadSuccess',
    ];
    public $csrf=true;
    public function init() {
        if (empty($this->url)) {
            $this->url = Url::to(['index']);
        }
        if (empty($this->id)) {
            $this->id = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
        }
        $this->options['id'] = $this->id;
        if (empty($this->name)) {
            $this->name = $this->hasModel() ? Html::getInputName($this->model, $this->attribute) : $this->id;
        }

        $asset = UploadifyAsset::register($this->view);
        $this->initUploadifyOptions($asset);

        parent::init();
    }

    private function initUploadifyOptions($asset) {
        $baseUrl = \Yii::$app->request->baseUrl . '/widgets/uploadify';
        $this->jsOptions['uploader'] = $this->url;
        $this->jsOptions['swf'] = $baseUrl.'/uploadify.swf';
        if($this->csrf) {
            $this->initUploadifyCsrfOption($this->jsOptions);
        }

        foreach ($this->jsOptions as $k => $v) {
            if(in_array($k, $this->events) && !($v instanceof JsExpression)) {
                $this->jsOptions[$k] = new JsExpression($v);
            }
        }
    }

    private function initUploadifyCsrfOption(&$jsOptions) {
        $session = \Yii::$app->session;
        $session->open();
        $sessionIdName = $session->getName();
        $sessionIdValue = $session->getId();

        $request = \Yii::$app->request;
        $csrfName = $request->csrfParam;
        $csrfValue = $request->getCsrfToken();
        $session->set($csrfName, $csrfValue);

        $jsOptions['formData'] = [
            $sessionIdName => $sessionIdValue,
            $csrfName => $csrfValue
        ];
    }

    /**
     * render file input tag
     * @return string
     */
    private function renderTag() {
        return Html::fileInput($this->name, null, $this->options);
    }

    /**
     * register script
     */
    private function registerScripts() {
        $jsonOptions = Json::encode($this->jsOptions);
        $script = <<<EOF
    $('#{$this->id}').uploadify({$jsonOptions});
EOF;
        $this->view->registerJs($script, View::POS_READY);
    }

    public function run() {
        $this->registerScripts();
        echo $this->jsOptions['uploader'];
            echo $this->renderTag();
    }
} 