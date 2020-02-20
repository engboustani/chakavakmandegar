<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventtime extends Model
{
    //
    /**
     * Get the event that owns the eventtime.
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }

    protected $appends = ['event_title'];
    protected $hidden = ['seats', 'tickets', 'discounts'];

    public function getEventTitleAttribute()
    {
        return $this->event->title;
    }

    public function seats()
    {
        return $this->hasMany('App\Seat', 'eventtime_id');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'eventtime_id');
    }

    public function seat($number)
    {
        return $this->seats()->where('number', $number)->first();
    }

    public function discounts()
    {
        return $this->hasMany('App\Discount');
    }

}
