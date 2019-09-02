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
        return $this->belongsTo('App\Event');
    }
}
