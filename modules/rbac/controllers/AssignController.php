<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-4-18
 * Time: 下午4:25
 */

namespace app\modules\rbac\controllers;

use Yii;
use app\core\base\backend\BackendBaseController;
use app\modules\rbac\models\Assignment;
use app\modules\rbac\models\Item;
use app\modules\user\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AssignController extends BackendBaseController{

    public function actionIndex() {
        $model = new ActiveDataProvider([
            'query' => Assignment::find()
        ]);
        return $this->render('index',['model'=>$model]);
    }

    public function actionCreate() {
        $model = new Assignment();
        $roleList = Item::findAll(['type'=>1]);
        $userList = User::find()->all();
        if($model->load(Yii::$app->request->post())) {
            $validated = Assignment::validated($model->item_name, $model->user_id);
            if (empty($validated)) {
                Assignment::assign($model->item_name, $model->user_id);
                return $this->redirect(['index']);
            }else {
                echo '<script type="text/javascript">alert("该组合已经存在");location.href="";</script>';
            }
        }
        return $this->render('create', ['model' => $model,'roleList'=>$roleList, 'userList'=>$userList]);
    }

    public function actionDelete($item_name, $user_id) {
        if (Assignment::deleteAll(['item_name' => $item_name, 'user_id' => $user_id])) {
            return $this->redirect(['index']);
        } else {
            throw new NotFoundHttpException('本次操作失败');
        }
    }

    public function actionView($item_name, $user_id) {
        return $this->render('view', [
            'model' => Assignment::findOne(['item_name' => $item_name, 'user_id' => $user_id]),
        ]);
    }

    public function actionUpdate($item_name, $user_id) {
        $model = Assignment::findOne(['item_name' => $item_name, 'user_id' => $user_id]);
        $roleList = Item::findAll(['type'=>1]);
        $userList = User::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = Assignment::validated($model->item_name, $model->user_id);
            if (empty($data)) {
                $model->save();
                $this->redirect(['index']);
            } else {
                echo '<script type="text/javascript">alert("该组合已经存在");location.href="";</script>';
            }
        }
        return $this->render('update', [ 'model' => $model,'roleList'=>$roleList, 'userList'=>$userList ]);
    }

    public function actionSearch() {
        $assign = new Assignment();
        $roleList = Item::findAll(['type'=>1]);
        $userList = User::find()->all();
        if ($assign->load(Yii::$app->request->post())) {
            if (isset($assign->item_name) && empty($assign->user_id)) {
                $query = Assignment::find()->where(['item_name' => $assign->item_name]);
            } elseif (isset($assign->user_id) && empty($assign->item_name)) {
                $query = Assignment::find()->where(['user_id' => $assign->user_id]);
            } else {
                $query = Assignment::find()->where(['item_name' => $assign->item_name, 'user_id' => $assign->user_id]);
            }

            $model = new ActiveDataProvider([
                'query' => $query,
            ]);
            return $this->render('search', ['model' => $model]);
        }
        return $this->render('search',['assign'=>$assign,'roleList'=>$roleList, 'userList'=>$userList]);
    }
}