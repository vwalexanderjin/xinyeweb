<?php


namespace app\core\base;


use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use yii\helpers\Url;

/**
 * Class BaseController
 * @package app\core\base
 */
class BaseController extends Controller{

    protected $_baseUrl;
    protected $_request;
    protected $_xyCms;
    protected $_xyCmsRelease;
    public $messageLayout = '//layouts/common/message';

    /**
     * @param 发送消息
     * @param string $type
     * @param null $redirect
     * @param null $resultType
     * @return array|bool|string
     * @throws \yii\base\ExitException
     */
    public function message($message, $type = 'error', $redirect = null, $resultType = null) {
        if($resultType === null) {
            $resultType =  Yii::$app->getRequest()->isAjax ? 'json' : 'html';
        } elseif($resultType === 'flash') {
            $resultType = Yii::$app->getRequest()->isAjax ? 'json' : $resultType;
        }
        $data = [
            'type' => $type,
            'message' => $message,
            'redirect' => Url::to($redirect)
        ];
        switch ($resultType) {
            case 'html':
                return $this->render($this->messageLayout, $data);
            case 'json':
                Yii::$app->getResponse()->format = Response::FORMAT_JSON;
                return $data;
            case 'flash':
                Yii::$app->session->setFlash($type, $message);
                if ($redirect !== null)  {
                    Yii::$app->end(0, $this->redirect($data['redirect']));
                }
                return true;

            default:
                return $message;
        }
    }
}