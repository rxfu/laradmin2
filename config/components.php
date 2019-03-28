<?php

return [
    'log' => [
        'grid' => true,
        [
            'field' => 'user_id',
        ],
        [
            'field' => 'ip',
        ],
        [
            'field' => 'level',
        ],
        [
            'field' => 'action',
        ],
        [
            'field' => 'content',
        ],
        [
            'field' => 'created_at',
        ],
    ],
    'user' => [
        [
            'field' => 'username',
        ],
        [
            'field' => 'password',
            'list' => false,
        ],
        [
            'field' => 'name',
        ],
        [
            'field' => 'email',
        ],
        [
            'field' => 'is_enable',
            'presenter' => true,
            'responsive' => 'none',
            'type' => 'radio',
        ],
        [
            'field' => 'is_super',
            'presenter' => true,
            'responsive' => 'none',
            'type' => 'radio'
        ],
        [
            'field' => 'created_at',
            'responsive' => 'none',
        ],
    ],
];
