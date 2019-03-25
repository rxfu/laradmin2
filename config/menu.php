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
        'password' => [
            'change' => [
                'title' => '修改密码',
                'icon' => 'shield-alt',
                'route' => 'password.change',
            ],
        ],
    ],
];
