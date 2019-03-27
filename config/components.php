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
    ],
];
