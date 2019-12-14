<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $appends = ['username'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getUsernameAttribute() {
        if(isset($this->user))
        {
            return $this->user->fullname;
        }
        return '';
    }


}
