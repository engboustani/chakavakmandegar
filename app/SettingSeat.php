<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingSeat extends Model
{
    public function getCapacityFullnessAttribute($capacity_fullness)
    {
        return (bool) $capacity_fullness;
    }
}
