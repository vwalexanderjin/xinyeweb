<?php
namespace app\core\base\backend;
use Yii;
use app\core\base\BaseController;
use yii\imagine\Image;
use yii\web\UploadedFile;

class BackendBaseController extends BaseController{

    public $layout = '@app/views/layouts/backend/main';
    ///public $layout = "@app/views/layouts/main";
    public function init() {
        parent::init();
        //$this->layout = '/backend/main';
        //$this->checkAdmin();
    }

    public function checkAdmin() {
        if (!Yii::$app->getUser()->can('visitAdmin')) {
            //throw new NotFoundHttpException('The requested page does not exist.');
            return $this->redirect(['/admin/index/login']);
        }
    }

    //以type 作爲圖片目錄 例如 link/post/ad...
    public function uploadFile($model, $attribute, $type="public",$oldImgName=null, $width=null, $height=null){
        $upload = UploadedFile::getInstance($model, $attribute);

        if ($upload) {
            $dir = $this->fileExists(Yii::getAlias('./uploads/').$type.'/');//得到目錄
            $preRand = 'img_' .time().mt_rand(0, 9999);
            $imgName = $preRand . '.' .$upload->extension;
            $filePath = $dir .$imgName;
            if ($upload->saveAs($filePath)) {//upload ok
                if (isset($oldImgName) && $oldImgName!=null) @unlink($dir.$oldImgName);
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
            mkdir($dir,777);
        }
        return $dir;
    }
}