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
        '系统' => [
            'controller' => 'home',
            'url' => 'config/config/basic',
            'action' => [
                [
                    'name' => '基本设置',
                    'url' => 'config/config/basic'
                ],
                [
                    'name' => '模板设置',
                    'url' => 'config/config/theme'
                ],
                [
                    'name' => 'SEO设置',
                    'url' => 'admin/category/index'
                ],
                [
                    'name' => '邮箱设置',
                    'url' => 'config/config/email'
                ],
                [
                    'name' => '清理缓存',
                    'url' => 'admin/public/clear-cache'
                ]
            ],
        ],
        '内容' => [
            'controller' => 'home',
            'url' => 'post/post/index',
            'action' => [
                [
                    'name' => '内容管理',
                    'url' => 'post/post/index',
                ],
                [
                    'name' => '分类管理',
                    'url' => 'category/category/index',
                ],
                [
                    'name' => '链接管理',
                    'url' => 'link/link/index',
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
        '模板' => [
            'controller' => 'home',
            'url' => 'file/file/index',
            'action' => [
                [
                    'name' => '模板管理',
                    'url' => 'file/file/index'
                ]
            ],
        ],
        '相册' => [
            'controller' => 'home',
            'url' => 'album/album-cate/index',
            'action' => [
                [
                    'name' => '相册管理',
                    'url' => 'album/album-cate/index'
                ]
            ],
        ],
    ];
}