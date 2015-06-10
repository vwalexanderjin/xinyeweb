<?php
namespace app\core\components;
use yii\web\UploadedFile;

class XY {

    public function uploadFile($model, $attribute, $path){
        $file = UploadedFile::getInstance($model, $attribute);
        $path = $this->fileExists($path);
        if ($file->saveAs($path.$file->name)) return true;
        else return false;
    }


    //¼ì²âpathÊÇ·ñ´æÔÚ
    protected function fileExists($path) {
        if (!file_exists($path)) {
            @mkdir($path,777);
        }
        return $path;
    }
} 