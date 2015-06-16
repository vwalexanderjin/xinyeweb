<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-16
 * Time: 下午11:25
 */

namespace app\modules\file\components;


class File {

    public static function transByte($size) {
        //Bytes/KB/MB/GB/TB/EB
        $arr = ['Byte','KB','MB','GB','TB','EB'];
        $i = 0;
        while ($size >= 1024) {
            $size /= 1024;
            $i++;
        }
        return round($size,2).$arr[$i];
    }
}

