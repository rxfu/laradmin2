<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ip', 'level', 'action', 'content'
    ];
    
    public function getIpAttribute($value)
    {
        return long2ip($value);
    }

    public function setIpAttribute($value)
    {
        $this->attributes['ip'] = ip2long($value);
    }

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}
