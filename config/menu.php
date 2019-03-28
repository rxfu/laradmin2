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
                'url' => '/',
            ],
        ],
        'user' => [
            'list' => [
                'title' => '用户管理',
                'icon' => 'users',
                'route' => 'user.list',
            ],
        ],
        'log' => [
            'list' => [
                'title' => '日志管理',
                'icon' => 'book',
                'route' => 'log.list',
            ],
        ],
        'password' => [
            'password' => [
                'title' => '修改密码',
                'icon' => 'shield-alt',
                'route' => 'password.password',
            ],
        ],
    ],
];
