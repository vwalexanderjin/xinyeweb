<?php

namespace app\controllers;


use app\core\base\BaseController;
use app\modules\post\models\Post;
use yii\data\Pagination;

class BlogController extends BaseController{

    public function actionIndex () {
        $data = Post::find()->orderBy('utime DESC');
        $pages = new Pagination(['totalCount'=>$data->count(), 'pageSize'=>'1']);
        $blogList = $data->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        return $this->render('index',['blogList'=>$blogList,'pages'=>$pages]);
    }

    public function actionView($id) {
        $info = Post::find()->where(['id'=>$id])->asArray()->one();
        return $this->render('view',['info'=>$info]);
    }
}