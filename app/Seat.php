<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $appends = ['ticket'];

    public function eventtime()
    {
        return $this->belongsTo('App\Eventtime', 'eventtime_id');
    }

    public function getTicketAttribute()
    {
        $ticket = \App\Ticket::where('seat_id', $this->id)->first();
        if($ticket != null)
            return ['reserved' => true];
        else
            return null;
    }

    public function getReservedAttribute($reserved)
    {
        return (bool) $reserved;
    }

    public function getCapacityFullnessAttribute($capacity_fullness)
    {
        return (bool) $capacity_fullness;
    }
}