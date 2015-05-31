<?php
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;
?>
    <p>
        <?= Html::a("返回",['permission/index'],['class' => 'btn btn-primary']) ?>
    </p>
<div class="permission-update">

    <?= $this->render('_form', [
        'model' => $item,
    ]) ?>

</div>