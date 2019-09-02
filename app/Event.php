<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Event extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content'];

    /**
     * Create a new event instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $event = new Event;

        $event->title = $request->title;
        $event->content = $request->content;

        $event->save();
    }

    protected $appends = ['eventtime_count'];

    /**
     * Get the eventtimes for the event.
     */
    public function eventtimes()
    {
        return $this->hasMany('App\Eventtime');
    }

    public function getEventtimeCountAttribute()
    {
        return DB::table('eventtimes')
        ->where('event_id', $this->id)
        ->count();
    }
}
