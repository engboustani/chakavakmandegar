<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventtimeController extends Controller
{
    public function getList()
    {
        $eventtimes = \App\Eventtime::all();

        return $eventtimes->makeHidden(['updated_at', 'created_at'])->toJson();
    }
}
