<?php

namespace app\modules\admin\controllers;

use app\core\base\backend\BackendBaseController;
use yii\web\Controller;

class DefaultController extends BackendBaseController
{
    public function actionIndex()
    {
        $this->layout = '/backend/main_nothing';
        return $this->render('index');
    }

    public function actionHome() {
        $data['soft'] = 'bagecms';
        $data['softVersion'] = '2.0';
        $data['softRelease'] = '2.0';
        $data['serverSoft'] = $_SERVER['SERVER_SOFTWARE'];
        $data['serverOs'] = PHP_OS;
        $data['phpVersion'] = PHP_VERSION;
        $data['fileupload'] = ini_get('file_uploads') ? ini_get('upload_max_filesize') : '禁止上传';
        $data['serverUri'] = $_SERVER['SERVER_NAME'];
        $data['maxExcuteTime'] = ini_get('max_execution_time') . ' 秒';
        $data['maxExcuteMemory'] = ini_get('memory_limit');
        //$data['magic_quote_gpc'] = MAGIC_QUOTE_GPC ? '开启' : '关闭';
        $data['magic_quote_gpc'] = true ? '开启' : '关闭';
        $data['allow_url_fopen'] = ini_get('allow_url_fopen') ? '开启' : '关闭';
        $data['excuteUseMemory'] = function_exists('memory_get_usage') ? '已知': '未知';
        $dbsize = 0;
        $connection = \Yii::$app->db;
        $sql = 'SHOW TABLE STATUS LIKE \'' . $connection->tablePrefix . '%\'';
        $command = $connection->createCommand($sql)->queryAll();
        foreach ($command as $table)
            $dbsize += $table['Data_length'] + $table['Index_length'];
        $mysqlVersion = $connection->createCommand("SELECT version() AS version")->queryAll();
        $data['mysqlVersion'] = $mysqlVersion[0]['version'];
        $data['dbsize'] = $dbsize ? '已知' : '未知';
        //$notebook = Admin::model()->findByPk($this->_admini['userId']);
        $notebook = ['aa'];
        $env = 'aa';
        return $this->render('home', array ('notebook' => $notebook ,'env'=>$env, 'server' => $data ));
    }
}
