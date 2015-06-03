<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-3
 * Time: 下午9:14
 */

namespace app\core\lib;


class Common {

    public static function p($arr) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}