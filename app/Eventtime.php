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
        return $this->belongsTo('App\Event', 'id');
    }

    protected $appends = ['event_title'];

    public function getEventTitleAttribute()
    {
        return \App\Event::find($this->event_id)->title;
    }
}
