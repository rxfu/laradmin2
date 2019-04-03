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
            'field' => 'path',
            'list' => true,
        ],
        [
            'field' => 'method',
            'list' => true,
        ],
        [
            'field' => 'action',
            'list' => true,
        ],
        [
            'field' => 'entity',
            'list' => true,
        ],
        [
            'field' => 'entity_id',
            'list' => true,
        ],
        [
            'field' => 'content',
            'list' => true,
            'responsive' => 'hidden',
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
            'validation' => 'required|unique:users,username,' . substr(request()->path(), strrpos(request()->path(), '/') + 1),
        ],
        [
            'field' => 'password',
            'list' => false,
            'create' => true,
            'type' => 'password',
            'required' => true,
            'validation' => 'required|min:6',
            'help' => '密码至少6位',
        ],
        [
            'field' => 'name',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'text',
            'required' => true,
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
