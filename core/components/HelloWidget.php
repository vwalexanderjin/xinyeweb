<?php

namespace app\core\components;


use app\core\base\BaseWidget;
use yii\helpers\Html;

class HelloWidget extends BaseWidget {

    public $message;

    public function init() {
        parent::init();
        if ($this->message === null) {
            $this->message = "Hello Widget";
        }
    }

    public function run() {
        return Html::encode($this->message);
    }
} 