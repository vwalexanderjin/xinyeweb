<?php

namespace app\modules\rbac\controllers;

use app\core\base\backend\BackendBaseController;
use app\modules\rbac\component\Rbac;
use app\modules\rbac\models\ItemChild;
use Yii;
use app\modules\rbac\models\Item;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class RoleController extends BackendBaseController
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
     * @return string 角色列表
     */
    public function actionIndex() {
        $item = new Item();
        $model = new ActiveDataProvider([
            'query' => Item::find()->where(['type'=> \yii\rbac\Item::TYPE_ROLE])
        ]);
        return $this->render('index',['model'=>$model, 'item'=>$item]);
    }

    /**
     * @return string|\yii\web\Response 创建角色
     */
    public function actionCreate() {
        $model = new Item();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->createRole($model->name, $model->description);//item中添加role
            //itemChild中添加赋权
            if($model->child != null) {
                foreach($model->child as $child) {
                    ItemChild::createEmpowerment($model->name,$child);
                }
            }
            return $this->message('操作成功','success',['index']);
            //return $this->redirect(['index']);
        } else {
            $permissions = Item::findAll(['type'=>\yii\rbac\Item::TYPE_PERMISSION]);
            return $this->render('create',['model'=>$model, 'permissions'=>$permissions]);
        }
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException 更新角色
     */
    public function actionUpdate($id) {
        $item = $this->findModel($id);
        if($item->load(Yii::$app->request->post()) && $item->validate()) {
            $this->objectRbac()->deleteItemChild($id);
            $this->objectRbac()->updateItem($id, $item);
            if($item->child != null) {
                foreach($item->child as $child) {
                    ItemChild::createEmpowerment($item->name,$child);
                }
            }
            //return $this->redirect(['index']);
            return $this->message('操作成功','success',['index']);
        } else {
            $permissions = Item::findAll(['type'=>\yii\rbac\Item::TYPE_PERMISSION]); //所有权限列表
            $isHavePermissions = ItemChild::findAll(['parent'=>$id]);
            if($isHavePermissions != null ) {
                foreach($isHavePermissions as $p) {
                    $item->child[] = $p->child;
                }
            }
            return $this->render('update',[
                'item'=>$item,
                'permissions'=>$permissions,
            ]);
        }
    }

    /**
     * @param $id
     * @return \yii\web\Response 删除角色
     */
    public function actionDelete($id) {
        $bj = $this->objectRbac()->deleteItem($id, 'role');
        if($bj) {
            //return $this->redirect(['index']);
            return $this->message('操作成功','success',['index']);
        }
    }

    /**
     * @return string搜索角色
     */
    public function actionSearch() {
        $item = new Item();
        if($item->load(Yii::$app->request->post())) {
            $model = new ActiveDataProvider([
                'query' => Item::find()->where(['name'=>$item->name, 'type'=>\yii\rbac\Item::TYPE_ROLE])
            ]);
        }
        return $this->render('search',['model'=>$model]);
    }

    /**
     * @param $id
     * @throws NotFoundHttpException 查找角色
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
