<?php
namespace app\core\components;
use yii\imagine\Image;
use yii\web\UploadedFile;

class XY {

    //以type 作爲圖片目錄 例如 link/post/ad...
    public function uploadFile($model, $attribute, $type="public"){
        $upload = UploadedFile::getInstance($model, $attribute, $oldImg=null, $width=null, $height=null);
        if ($upload) {
            $dir = $this->fileExists(\Yii::getAlias('./uploads/').$type);//得到目錄
            $preRand = 'img_' .time().mt_rand(0, 9999);
            $imgName = $preRand . '.' .$upload->extension;
            $filePath = $dir . '/' .$imgName;
            if ($upload->saveAs($filePath)) {//upload ok
                if (isset($oldImg) && $oldImg!=null) @unlink($oldImg);
                $model->$attribute = $imgName;
                if (isset($width) && isset($height)) {
                    Image::thumbnail($filePath, $width, $height)->save($filePath);
                }
                return true;
            } else {
                return false;
            }
        }
        return false;
    }



    protected function fileExists($dir) {
        if (!file_exists($dir)) {
            @mkdir($dir,777);
        }
        return $dir;
    }
} 