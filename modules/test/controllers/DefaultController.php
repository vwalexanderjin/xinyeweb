<?php

namespace app\modules\test\controllers;

use Yii;
use app\core\base\backend\BackendBaseController;
use yii\data\Pagination;
use yii\helpers\Json;

class DefaultController extends BackendBaseController
{
    public function actionIndex()
    {

        //$email = "1@qq.com,2@qq.com,3@qq.com,4@qq.com,5@qq.com,6@qq.com,7@qq.com,8@qq.com,9@qq.com";
        //echo Yii::getAlias('/static/email.txt');
        //$emailArr = explode(',',$email);
        $p = Yii::$app->request->get('p');
        $emailStr = file_get_contents(Yii::getAlias('./static/email.txt'));
        //echo $emailStr;
        $data = Json::decode($emailStr);
        $total = count($data);
        $pageSize = 2;
        $arr = $this->page($data, 2, $p);

        if (count($arr) == $pageSize) {
            foreach ($arr as $v) {
                echo $v . "發送成功<br>";
            }
            $url = Yii::$app->urlManager->createUrl(['test/default/index','p'=>$p+1]);
            $jsStr = <<<JS
<script>
window.setTimeout("window.location.href='{$url}'", 3000)
</script>
JS;
            echo $jsStr;
        } else {
            foreach ($arr as $v) {
                echo $v . "發送成功<br>";
            }
            echo "發送完成";
        }
        //return $this->render('index');
    }

    public function page($arr, $pageSize, $current) {
        $_return = [];
        $num = count($arr);
        $total = ceil($num/$pageSize);//分頁總數
        $prev = ($current-1<=0) ? "1" : ($current-1);//上一頁
        $next = ($current+1>=$total) ? $total : ($current+1);//下一頁
        $current = $current>$total ? $total : $current;//當前頁
        $start = ($current-1)*$pageSize;
        if (($start+$pageSize)>$num) {//避免溢出
            $iSize = $start+$num%($current-1);
        } else {
            $iSize = $start+$pageSize;
        }
        for($i=$start; $i<$iSize; $i++) {
            array_push($_return, $arr[$i]);
        }
        return $_return;
    }
}
