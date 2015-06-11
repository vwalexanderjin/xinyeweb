<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'rbac' => [
            'class' => 'app\modules\rbac\Module',
        ],
        'config' => [
            'class' => 'app\modules\config\Module',
        ],
        'post' => [
            'class' => 'app\modules\post\Module',
        ],
        'category' => [
            'class' => 'app\modules\category\Module',
        ],
        'link' => [
            'class' => 'app\modules\link\Module',
        ],
        'comment' => [
            'class' => 'app\modules\comment\Module',
        ],
        'test' => [
            'class' => 'app\modules\test\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9Oc5DPQRddblWBqTulIXcLTnN2CvW9gK',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'error/error',
            //'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'xy_auth_item',
            'itemChildTable' => 'xy_auth_item_child',
            'assignmentTable' => 'xy_auth_assignment',
            'ruleTable' => 'xy_auth_rule',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            //'useFileTransport' => true,//放在本地的邮件列表,测试邮件的时候可以开启这个
            /*'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'hotar.zhang@gmail.com',
                'password' => 'hotermomo811125',
                'port' => '465',
                'encryption' => 'ssl',
            ],*/
            /*'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'xinyeweb@163.com',
                'password' => 'xinyeweb2014',
                'port' => '25',
                'encryption' => 'tls',
            ],*/
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',
                'username' => '232767044@qq.com',
                'password' => 'xinyeweb2014',
                'port' => '25',
                'encryption' => 'tls',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['232767044@qq.com'=>'admin']
            ],
        ],
        /*'session' => [
              'class' => 'yii\web\DbSession',
              // 'db' => 'mydb',
               'sessionTable' => 'xy_session',
         ],*/
        //路由
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                'index' => 'site/index',
                'case'  =>  'case/index',
                'service'   =>  'service/index',
                'blog'  =>  'article/index',
                'about' => 'site/about',
                'contact' => 'site/contact',
                'login' => 'site/login',
            ],
        ],*/
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        //主题
        'view' => [
            //'class' => 'yii\web\View',
            'theme' =>  [
                'pathMap' => ['@app/views' => '@app/themes/xinye2014'],
//                'baseUrl' => '@web/themes/xinye2014'
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
