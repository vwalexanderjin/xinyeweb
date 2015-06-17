<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-5-25
 * Time: 下午11:38
 */

namespace app\modules\config\models;


use app\core\base\BaseModel;

class BaseConfig extends BaseModel{

    protected function getConfigKeys() {
        //return $this->attributes();//反射比较耗时
        return array_keys($this->attributes);
    }

    protected function initAllInternal() {
        $keys = $this->getConfigKeys();
        foreach ($keys as $key) {
            $this->initOneInternal($key);
        }
    }

    protected function initOneInternal($key, $defaultValue='') {
        $model = Config::findOne(['key'=>$key]);
        if ($model != null) {
            $this->$key = $model->val;
        } else {
            $model = new Config();
            $model->key = $key;
            $model->val = '';
            $model->save();
            $this->$key = $defaultValue;
        }

    }

    protected function saveAll() {
        $keys = $this->getConfigKeys();
        foreach ($keys as $key) {
            //echo $key. "=============" .$this->$key."<br>";
            $this->saveOne($key, $this->$key);
        }
    }

    protected function saveOne($key, $val) {
        Config::updateAll(['val'=>$val],['key'=>$key]);
    }
}