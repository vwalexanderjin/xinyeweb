<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

\app\assets\AdminAsset::register($this);
//$this->registerCssFile(Yii::$app->request->baseUrl.'/static/admin/css/common.css',['depends'=>\yii\web\YiiAsset::className()]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div id="append_parent"></div>
    <div class="container" id="cpcontainer" style="margin-left: 0; width: 100%">
        <?=$content?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>