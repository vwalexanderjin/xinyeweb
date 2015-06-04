<?php
/**
 * Created by PhpStorm.
 * User: hoter
 * Date: 15-6-3
 * Time: 下午8:55
 */
namespace app\core\lib;
class Category {

    //组合一维数组
    public static function unlimitedForLevel($cate, $html='--', $pid=0, $level=0){
        $arr = [];
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level + 1;
                $v['html'] = str_repeat($html, ($level*9));
                $arr[] = $v;
                $arr = array_merge($arr, self::unlimitedForLevel($cate, $html, $v['id'], $level+1));
            }
        }
        return $arr;
    }

    //组合多维数组
    Static Public function unlimitedForLayer ($cate, $name = 'child', $pid = 0) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }

    //传递一个子分类返回所有父级分类
    Static Public function getParents ($cate, $id) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['id'] == $id) {
                $arr[] = $v;
                $arr = array_merge(self::getParents($cate, $v['pid']), $arr);
            }
        }
        return $arr;
    }

    //传递一个父级ID 返回所有子集分类ID
    Static Public function getChildsId ($cate, $pid) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v['id'];
                $arr = array_merge($arr, self::getChildsId($cate, $v['id']));
            }
        }
        return $arr;
    }

    //传递一个父级ID 返回所有子集分类
    Static Public function getChilds ($cate, $pid) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                $arr = array_merge($arr, self::getChilds($cate, $v['id']));
            }
        }
        return $arr;
    }
}