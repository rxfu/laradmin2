<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'begin_at', 'end_at', 'is_enable',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'begin_at' => 'datetime',
        'end_at' => 'datetime',
        'is_enable' => 'boolean',
    ];

    protected $presenter = 'App\Presenters\SettingrPresenter';
}
