<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users() {
    	return $this->belongsToMany('App\Entities\User');
    }

    public function permissions() {
    	return $this->belongsToMany('App\Entities\Permission');
    }
}
