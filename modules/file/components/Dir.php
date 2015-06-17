<?php
namespace app\modules\file\components;

class Dir {

    public static  function readDirectory($path) {
        $handle = opendir($path);//打开指定的目录
        while (($item=readdir($handle)) !== false) {
            if ($item!="." && $item!="..") {// . 和  .. 特殊目录

                if (is_dir($path."/".$item)) {//目录
                    $arr['dir'][] = $item;
                }

                if (is_file($path."/".$item)) {//文件
                    $arr['file'][] = $item;
                }
            }
        }
        closedir($handle);
        return $arr;
    }

    public static $sum = 0;

    public static function dirSize($path) {
        global $sum;
        $handle = opendir($path);
        while (($item = readdir($handle)) !== false) {
            if ($item!="." && $item!="..") {
                if (is_file($path."/".$item)) {
                    $sum+=filesize($path . "/" . $item);
                }
                if (is_dir($path . "/" . $item)) {
                    $func = __FUNCTION__;
                    $func($path . "/" . $item);
                }

            }
        }
        closedir($handle);
        return $sum;
    }

}

/*function readDirectory($path) {
    $handle = opendir($path);//打开指定的目录
    while (($item=readdir($handle)) !== false) {
        // . 和  .. 特殊目录
        if ($item!="."&&$item!="..") {
            //目录
            if (is_dir($item)) {
                $arr['dir'][] = $item;
            }
            //文件
            if (is_file($item)) {
                $arr['file'][] = $item;
            }
        }
    }
}*/