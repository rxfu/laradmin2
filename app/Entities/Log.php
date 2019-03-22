<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function user() {
    	return $this->belongsTo('App\Entities\User');
    }
}
