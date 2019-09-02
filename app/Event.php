<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * Get the eventtimes for the event.
     */
    public function eventtimes()
    {
        return $this->hasMany('App\Eventtime');
    }
}
