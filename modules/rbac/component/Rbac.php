<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-4-7
 * Time: 下午9:21
 */
namespace app\modules\rbac\component;
use yii\rbac\DbManager;

class Rbac extends DbManager{

    public  function updateItem($name, $item) {
        parent::updateItem($name, $item);
        return true;
    }

    public function deleteItem($name, $params)
    {
        if (isset($name) && !empty($name)) {
            $a = new self();
            $a->db->createCommand()->delete($this->itemTable, ['name' => $name])->execute();

            if ($params == 'permission') {
                $a->db->createCommand()->delete($this->itemChildTable, ['child' => $name])->execute();
            } else if ($params == 'roles') {
                $a->db->createCommand()->delete($this->itemChildTable, ['parent' => $name])->execute();
                $a->db->createCommand()->delete($this->assignmentTable, ['item_name' => $name])->execute();
            }
        }
        return true;
    }

    public function deleteItemChild($roleName) {
        if(isset($roleName) && !empty($roleName)) {
            $a = new self();
            $a->db->createCommand()->delete($this->itemChildTable, ['parent'=>$roleName])->execute();
        }
        return true;
    }
}