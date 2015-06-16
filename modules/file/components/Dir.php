<?php
namespace app\modules\file\components;

class Dir {

    public static  function readDirectory($path) {
        $handle = opendir($path);//打开指定的目录
        $arr = array();
        while (($item=readdir($handle)) !== false) {
            if ($item!="." && $item!="..") {// . 和  .. 特殊目录

                if (is_dir($path.$item)) {//目录
                    $arr['dir'][] = $item;
                }

                if (is_file($path.$item)) {//文件
                    $arr['file'][] = $item;
                }
            }
        }
        closedir($handle);
        return $arr;
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