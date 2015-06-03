<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/3
 * Time: 9:37
 */

namespace app\models;


use app\core\base\BaseModel;

class UploadForm extends BaseModel{

    public $imageFile;

    public function rules() {
        return [
            [['imageFile'], 'file','skipOnEmpty' => false, 'extensions'=>'png, jpg']
        ];
    }

    public function upload() {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $model->imageFile->baseName. '.' .$model->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
} 