<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    protected $appends = ['bill'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function discount()
    {
        return $this->belongsTo('App\Discount', 'discount_id');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'factor_id');
    }

    public function getBillAttribute()
    {
        $discount_per = 0;
        $sumprice = 0;
        $discount_value = 0;
        $totalprice = 0;
        if(isset($this->discount_id))
        {
            $discount = \App\Discount::find($this->discount_id);
            if(($discount->factors->where('user_id', Auth::id())->count() == 0)
                && ($discount->used_count <= $discount->use_count)
                && (Carbon::now() <= $discount->expired_at))
            {
                $discount_per = $discount->percentage;
            }
        }
        foreach ($this->tickets as $key => $ticket) {
            $sumprice += $ticket->seat->price;
        }
        $discount_value = $sumprice * ($discount_per / 100);
        $totalprice = $sumprice - $discount_value;

        return $totalprice;
    }


}
