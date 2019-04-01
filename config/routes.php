<?php

return [
    'home' => [
        [
            'url' => 'dashboard',
            'action' => 'dashboard',
            'method' => 'get',
        ],
    ],
    'password' => [
        [
            'url' => 'password',
            'action' => 'password',
            'method' => 'get',
        ],
        [
            'url' => 'change',
            'action' => 'change',
            'method' => 'put',
        ],
    ],
    'log' => [
        [
            'url' => '/',
            'action' => 'index',
            'method' => 'get',
        ],
    ],
    'user' => [
        [
            'url' => '{action?}/{id?}',
            'action' => 'index',
            'method' => 'get',
        ],
        [
            'url' => 'store',
            'action' => 'store',
            'method' => 'post',
        ],
    ],
];
