<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-5-19
 * Time: 下午9:57
 */
namespace app\core\base\backend;
use app\core\base\BaseController;

class BackendBaseController extends BaseController{

    public $layout = '@app/views/layouts/backend/main';
    ///public $layout = "@app/views/layouts/main";
    public function init() {
        parent::init();
        //$this->layout = '/backend/main';
        //$this->checkAdmin();
    }

    public function checkAdmin() {
        if (!\Yii::$app->getUser()->can('visitAdmin')) {
            //throw new NotFoundHttpException('The requested page does not exist.');
            return $this->redirect(['/admin/index/login']);
        }
    }
}