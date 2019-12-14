<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $appends = ['thumbnail_model', 'header_model'];

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

    public function categories()
    {
        return $this->belongsToMany('App\PostCategory','post_category','cat_id','post_id');
    }

}

