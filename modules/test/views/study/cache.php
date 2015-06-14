<p>片段缓存</p>
<?php
    $dependency = [//缓存依赖
        'class' => 'yii\caching\DbDependency',
        'sql' => 'SELECT MAX(updated_at) FROM post'
    ];
    $this->beginCache($id,['duration'=>3600,'variation'=>[Yii::$app->language],'dependency'=>$dependency,'enable'=>Yii::$app->request->isGet]) {
        //生成缓存

        echo $this->renderDynamic('return Yii::$app->user->identity->username');//动态内容， 即使在缓存中也动态显示

        $this->endCache()
    }
//$dependency 缓存依赖
//duration 缓存过期时间
//variation 标量
//enable get的时候才使用缓存

?>