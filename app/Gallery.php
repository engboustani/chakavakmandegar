<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function media()
    {
        return $this->hasMany('App\Media');
    }

    public function addMedia($media)
    {
        $media->gallery_id = $this->id;
        $count = $this->media->count();
        $media->gallery_sort = $count;
        $media->save();
    }
}
