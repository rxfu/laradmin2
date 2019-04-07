<?php

return [
    'navigation' => [
        [
            'title' => '首页',
            'url' => '/',
        ],
        [
            'title' => '联系我们',
            'url' => '/contact',
        ],
    ],
    'sidebar' => [
        'home' => [
            'dashboard' => [
                'title' => '使用说明',
                'icon' => 'tachometer-alt',
                'route' => 'home.dashboard',
            ],
        ],
        'user' => [
            'index' => [
                'title' => '用户管理',
                'icon' => 'users',
                'route' => 'user.index',
            ],
        ],
        'role' => [
            'index' => [
                'title' => '角色管理',
                'icon' => 'users',
                'route' => 'role.index',
            ],
        ],
        'permission' => [
            'index' => [
                'title' => '权限管理',
                'icon' => 'users',
                'route' => 'permission.index',
            ],
        ],
        'department' => [
            'index' => [
                'title' => '部门管理',
                'icon' => 'users',
                'route' => 'department.index',
            ],
        ],
        'setting' => [
            'index' => [
                'title' => '系统设置',
                'icon' => 'users',
                'route' => 'setting.index',
            ],
        ],
        'log' => [
            'index' => [
                'title' => '日志管理',
                'icon' => 'book',
                'route' => 'log.index',
            ],
        ],
        '个人设置',
        'password' => [
            'password' => [
                'title' => '修改密码',
                'icon' => 'shield-alt',
                'route' => 'password.password',
            ],
        ],
    ],
];
