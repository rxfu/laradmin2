<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_enable' => 'boolean',
    ];
}
