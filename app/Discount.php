<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $appends = ['used_count', 'eventtime_count'];

    public function eventtimes()
    {
        return $this->hasMany('App\Eventtime');
    }

    public function factors()
    {
        return $this->hasMany('App\Factor');
    }

    public function getUsedCountAttribute()
    {
        return $this->factors->count();
    }

    public function getEventtimeCountAttribute()
    {
        return $this->eventtimes->count();
    }
}
