<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/19
 * Time: 12:27
 */
namespace app\modules\admin\components;
class MenuList
{

    public static $menus = [
        '首页' => [
            'controller' => 'home',
            'url' => 'admin/default/home',
            'action' => [
                [
                    'name' => '系统首页',
                    'url' => 'admin/default/home'
                ],
                [
                    'name' => '栏目管理',
                    'url' => 'admin/category/index'
                ]
            ],
        ],
        '设置' => [
            'controller' => 'home',
            'url' => 'config/config/basic',
            'action' => [
                [
                    'name' => '基本设置',
                    'url' => 'config/config/basic'
                ],
                [
                    'name' => 'SEO设置',
                    'url' => 'admin/category/index'
                ],
                [
                    'name' => '自定义设置',
                    'url' => 'admin/category/index'
                ]
            ],
        ],
        '内容' => [
            'controller' => 'home',
            'url' => 'post/post/index',
            'action' => [
                [
                    'name' => '分类管理',
                    'url' => 'category/category/index',
                ],
                [
                    'name' => '内容管理',
                    'url' => 'post/post/index',
                ],
                [
                    'name' => '链接管理',
                    'url' => 'link/link/index',
                ],
                [
                    'name' => '评论管理',
                    'url' => 'comment/comment/index'
                ],
                [
                    'name' => '专题管理',
                    'url' => 'admin/category/index'
                ],
                [
                    'name' => '单页管理',
                    'url' => 'page/page/index'
                ],
                [
                'name' => '幻灯片',
                'url' => 'ad/ad/index'
            ]
            ],
        ],
        '权限' => [
            'controller' => 'home',
            'url' => 'rbac/role/index',
            'action' => [
                [
                    'name' => '许可管理',
                    'url' => 'rbac/permission/index'
                ],
                [
                    'name' => '角色管理',
                    'url' => 'rbac/role/index'
                ],
                [
                    'name' => '赋权管理',
                    'url' => 'rbac/assign/index'
                ]
            ],
        ],
    ];
}