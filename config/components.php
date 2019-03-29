<?php

return [
    'log' => [
        'grid' => true,
        [
            'field' => 'user_id',
            'list' => true,
            'responsive' => 'all',
        ],
        [
            'field' => 'ip',
            'list' => true,
        ],
        [
            'field' => 'level',
            'list' => true,
        ],
        [
            'field' => 'action',
            'list' => true,
        ],
        [
            'field' => 'content',
            'list' => true,
            'responsive' => 'all',
        ],
        [
            'field' => 'created_at',
            'list' => true,
        ],
    ],
    'user' => [
        [
            'field' => 'username',
            'list' => true,
            'create' => true,
            'responsive' => 'all',
            'type' => 'text',
        ],
        [
            'field' => 'password',
            'list' => false,
            'create' => true,
            'type' => 'password',
        ],
        [
            'field' => 'name',
            'list' => true,
            'create' => true,
            'type' => 'text',
        ],
        [
            'field' => 'email',
            'list' => true,
            'create' => true,
            'type' => 'text',
        ],
        [
            'field' => 'is_enable',
            'list' => true,
            'create' => true,
            'presenter' => true,
            'responsive' => 'none',
            'type' => 'radio',
        ],
        [
            'field' => 'is_super',
            'list' => true,
            'create' => true,
            'presenter' => true,
            'responsive' => 'none',
            'type' => 'radio'
        ],
        [
            'field' => 'created_at',
            'list' => true,
            'create' => false,
            'responsive' => 'none',
        ],
    ],
];
