<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $appends = ['count_users', 'poster_model'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'course_user');
    }

    public function getCountUsersAttribute()
    {
        return $this->users->count();
    }

    public function getPosterModelAttribute()
    {
        if(isset($this->poster) && $this->poster != 0)
        {
            $media = \App\Media::find($this->poster);
            return $media;
        }
        else
            return null;
    }
}
