<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function gallery()
    {
        return $this->belongsTo('App\Gallery', 'gallery_id');
    }
}
