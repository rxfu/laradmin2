<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Log extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ip', 'level', 'path', 'method', 'action', 'entity', 'content',
    ];
    
    public function getIpAttribute($value)
    {
        return long2ip($value);
    }

    public function setIpAttribute($value)
    {
        $this->attributes['ip'] = ip2long($value);
    }

    public function setMethod($value)
    {
        $this->attributes['method'] = Str::lower($value);
    }

    public function setEntity($value)
    {
        $this->attributes['entity'] = Str::lower($value);
    }

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}
