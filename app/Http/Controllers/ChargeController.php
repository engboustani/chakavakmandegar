<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function getLast5()
    {
        return \App\Charge::latest()->take(5)->get()->makeVisible(['username'])->makeHidden(['updated_at', 'user'])->toJson();
    }

    public function getList()
    {
        return \App\Charge::latest()->get()->makeVisible(['username'])->makeHidden(['updated_at', 'user'])->toJson();
    }

}
