<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-14
 * Time: 下午6:09
 */

namespace app\modules\test\controllers;


use app\core\base\backend\BackendBaseController;
use app\modules\user\models\User;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\Cookie;

class StudyController extends BackendBaseController{

    public function actionRes() {
//        $request = \Yii::$app->request;

        //獲取get参数
//        echo $request->get('id',20);
//        echo $request->post('name',3333);

        /*if ($request->isGet) {
            echo "this is get method";
        }*/

        //获取用户ip
        //echo $request->userIP;

        /*********************** 响应 ***********************/

        //响应处理
        //$response = \Yii::$app->response;
        //$response->statusCode = '404';
        //$response->headers->add('pragma','no-cache');//浏览器缓存
//        $response->headers->add('pragma','max-age-5');//缓存5秒
//        $response->headers->remove('pragma');//移除

        //跳转
        //$response->headers->add('location','http://www.baidu.com');
        //$this->redirect('http://www.baidu.com',302);

        //下载
//        $response->headers->add('content-disposition','attachment;filename="a.jpg"');
        //$response->sendFile('./robots.txt');


        /************************* session ******************************/
        /*$session = \Yii::$app->session;
        $session->open();
        if($session->isActive) {
            echo 'session is open';
        }
        $session->set("key",'value');
        $session->get('key');
        $session->remove('key');*/

        /***************************cookie***************************/
        //设置cookie 删除coookie 使用response
        /*$cookie = \Yii::$app->response->cookies;
        $cookie_data = [
            'name'=>'user', 'value'=>'zhangsan'
        ];*/
        //$cookie->add(new Cookie($cookie_data));
        //$cookie->remove('user');

        //get cookie 使用request
        /*$cookies = \Yii::$app->request->cookies;
        echo $cookies->getValue('user','defaultValue');*/

        /********************** view 数据安全 *************************/
        //Html::encode('');//转义特殊字符
        //HtmlPurifier::process('');//过滤掉script代码


        /************************* 数据块 ************************************/
        //block

        /******************************** 数据查询**************************************/
        $sql = "select * from test where id=1";
        $result =  User::findBySql($sql);
        //sql 注入
        //$id  = '1 or 1=1';
        //select * from test
        //采用站位符
        $sql = 'select * from test where id=:id';
        $result = User::findBySql($sql, array(':id'=>1))->all();

        User::find()->where(['id'=>1])->all();
        //查询id大于1
        User::find()->where(['>','id',1])->all();
        //id>=1且id<=2
        User::find()->where(['between','id',1,2])->all();
        //title like %title%
        User::find()->where(['like','title','title1'])->all();

        //c查询优化
        //1 查询结果转化成数组
        User::find()->where(['between','id',1,2])->asArray()->all();
        //2 批量查询 每次只拿2条  比如10000条数据 每次只拿100条
        foreach(User::find()->batch(2) as $tests) {

        }

        /******************关联查询***************************/
        //性能为题
        //关联查询结果缓存
        $customer = User::find()->where(['name'=>'zhangsan'])->one();
        $orders = $customer->orders; //select * from order where .....
        $orders2 = $customer->orders; //第二次的时候没进行查询而是从缓存中拿取 //如果更新了 则要先unser($customer->orders) 再调用

        //关联的查询多次查询
        $customers = User::find()->all(); // select * from user    //100条
        foreach ($customers as $customer) {
            $orders = $customer->orders;//select * from customer where customer_id = ...  //100次select
        }
        //总共101次select 优化
        $customers = User::find()->with('orders')->all(); // select * from user where customer_id in (....)
        foreach ($customers as $customer) {
            $orders = $customer->orders;//这里不执行select
        }

        /**************************************************************/

    }

    public function behaviors(){
        return [
            [
                'class' => 'yii\filter\PageCache',
                'only' => ['index'],
                'duration' => 60,
                'variations'=> [
                    \Yii::$app->language,
                ],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' =>  'SELECT COUNT(*) FROM post'
                ]
            ]
        ];
    }

    public function actionCache() {
        /**********************缓存*******************************/
        //片段缓存见view
        //页面缓存PageCache










    }
}