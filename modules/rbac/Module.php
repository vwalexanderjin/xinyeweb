<?php

namespace app\modules\rbac;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\rbac\controllers';

    public function init()
    {
        parent::init();
        //$this->layout = '/backend/main';
        // custom initialization code goes here
    }
}
