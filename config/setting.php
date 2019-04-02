<?php

return [
    'base' => '/laradmin',
    'name' => 'Laravel Admin',
    'slug' => 'LA',
    'keywords' => 'Laravel, Vue.js, Bootstrap, Admin page',
    'description' => 'Administration boilerplate using Laravel',
    'author' => 'Fu Rongxin',
    'copyright' => 'Fu Rongxin',
    'observers' => [
        App\Entities\User::class,
    ],
];
