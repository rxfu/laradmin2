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
        'user_id', 'ip', 'level', 'path', 'method', 'action', 'entity', 'entity_id', 'content',
    ];
    
    public function getIpAttribute($value)
    {
        return long2ip($value);
    }

    public function setIpAttribute($value)
    {
        $this->attributes['ip'] = ip2long($value);
    }

    public function setLevelAttribute($value)
    {
        $this->attributes['level'] = Str::lower($value);
    }

    public function setActionAttribute($value)
    {
        $this->attributes['action'] = Str::lower($value);
    }

    public function setMethodAttribute($value)
    {
        $this->attributes['method'] = Str::lower($value);
    }

    public function setEntityAttribute($value)
    {
        $this->attributes['entity'] = Str::lower($value);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}
