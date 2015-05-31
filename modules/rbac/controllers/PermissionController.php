<?php

namespace app\modules\rbac\controllers;

use app\core\base\backend\BackendBaseController;
use app\modules\rbac\component\Rbac;
use Yii;
use app\modules\rbac\models\Item;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class PermissionController extends BackendBaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string 许可列表
     */
    public function actionIndex() {
        $item = new Item();
        $model = new ActiveDataProvider([
            'query' => Item::find()->where(['type'=> \yii\rbac\Item::TYPE_PERMISSION])
        ]);
        return $this->render('index',['model'=>$model, 'item'=>$item]);
    }

    /**
     * @return string|\yii\web\Response 创建许可
     */
    public function actionCreate() {
        $model = new Item();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->createPermission($model->name, $model->description);
            //return $this->redirect(['index']);
            return $this->message('操作成功','success',['index']);
        } else {
            return $this->render('create',['model'=>$model]);
        }
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException 更新许可
     */
    public function actionUpdate($id) {
        $item = $this->findModel($id);
        if($item->load(Yii::$app->request->post()) && $item->validate()) {
            $this->objectRbac()->updateItem($id, $item);
            //return $this->redirect(['index']);
            return $this->message('操作成功','success',['index']);
        }
        return $this->render('update',['item'=>$item]);
    }

    /**
     * @param $id
     * @return \yii\web\Response 删除许可
     */
    public function actionDelete($id) {
        $bj = $this->objectRbac()->deleteItem($id, 'permission');
        if($bj) {
            //return $this->redirect(['index']);
            return $this->message('操作成功','success',['index']);
        }
    }

    /**
     * @return string搜索
     */
    public function actionSearch() {
        $item = new Item();
        if($item->load(Yii::$app->request->post())) {
            $model = new ActiveDataProvider([
                'query' => Item::find()->where(['name'=>$item->name, 'type'=>\yii\rbac\Item::TYPE_PERMISSION])
            ]);
        }
        return $this->render('search',['model'=>$model]);
    }

    /**
     * @param $id
     * @throws NotFoundHttpException 查找许可
     */
    private function findModel($id) {
        if(($model = Item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function objectRbac() {
        return new Rbac();
    }
}
