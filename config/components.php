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
            'edit' => true,
            'responsive' => 'all',
            'type' => 'text',
            'required' => true,
            'validation' => 'required',
        ],
        [
            'field' => 'password',
            'list' => false,
            'create' => true,
            'type' => 'password',
            'required' => true,
            'validation' => 'required|min:6',
        ],
        [
            'field' => 'name',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'text',
        ],
        [
            'field' => 'email',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'text',
        ],
        [
            'field' => 'is_enable',
            'list' => true,
            'create' => true,
            'edit' => true,
            'presenter' => true,
            'responsive' => 'none',
            'type' => 'radio',
            'values' => '1:是|0:否',
            'default' => '1',
            'required' => true,
            'validation' => 'required',
        ],
        [
            'field' => 'is_super',
            'list' => true,
            'create' => true,
            'edit' => true,
            'presenter' => true,
            'responsive' => 'none',
            'type' => 'radio',
            'values' => '1:是|0:否',
            'default' => '0',
            'required' => true,
            'validation' => 'required',
        ],
        [
            'field' => 'created_at',
            'list' => true,
            'create' => false,
            'responsive' => 'none',
        ],
    ],
];
