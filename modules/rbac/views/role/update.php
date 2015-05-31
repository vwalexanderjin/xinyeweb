<?php
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Update Role ' . $item->name;;
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-update">

    <?= $this->render('_form', [
        'model' => $item,
        'permissions' => $permissions,
    ]) ?>

</div>