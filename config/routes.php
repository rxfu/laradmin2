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
        [
            'url' => 'reset/{id}',
            'action' => 'reset',
            'method' => 'get',
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
        [
            'url' => 'update/{id}',
            'action' => 'update',
            'method' => 'put',
        ],
        [
            'url' => 'delete',
            'action' => 'delete',
            'method' => 'delete',
        ],
    ],
    'role' => [
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
        [
            'url' => 'update/{id}',
            'action' => 'update',
            'method' => 'put',
        ],
        [
            'url' => 'delete',
            'action' => 'delete',
            'method' => 'delete',
        ],
    ],
];
