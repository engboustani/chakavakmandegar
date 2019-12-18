<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $appends = ['event_name', 'eventtime_start', 'fullname'];

    public function eventtime()
    {
        return $this->belongsTo('App\Eventtime', 'eventtime_id');
    }

    public function seat()
    {
        return $this->belongsTo('App\Seat', 'seat_id');
    }

    public function factor()
    {
        return $this->belongsTo('App\Factor', 'factor_id');
    }

    public function getEventNameAttribute()
    {
        return $this->eventtime()->event()->title;
    }

    public function getEventtimeStartAttribute()
    {
        return $this->eventtime()->start;
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
