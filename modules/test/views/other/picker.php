<?php
use yii\jui\DatePicker;

echo DatePicker::widget([
    'language' => 'zh-CN',
    'name' => 'country',
    'clientOptions' => [
        'dataFormat' => 'yy-mm-dd'
    ]
]);

?>