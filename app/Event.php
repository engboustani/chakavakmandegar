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

    protected $appends = ['eventtime', 'eventtime_count', 'thumbnail_model', 'header_model'];

    /**
     * Get the eventtimes for the event.
     */
    public function eventtimes()
    {
        return $this->hasMany('App\Eventtime');
    }

    public function gallery()
    {
        return $this->belongsTo('App\Gallery', 'gallery_id');
    }

    public function getEventtimeCountAttribute()
    {
        return DB::table('eventtimes')
        ->where('event_id', $this->id)
        ->count();
    }

    public function getEventtimeAttribute()
    {
        return $this->eventtimes->makeHidden(['updated_at', 'created_at']);
    }

    public function getThumbnailModelAttribute()
    {
        if(isset($this->thumbnail_id) && $this->thumbnail_id != 0)
        {
            $media = \App\Media::find($this->thumbnail_id);
            return $media;
        }
        else
            return null;
    }

    public function getHeaderModelAttribute()
    {
        if(isset($this->header_id) && $this->header_id != 0)
        {
            $media = \App\Media::find($this->header_id);
            return $media;
        }
        else
            return null;
    }
}
