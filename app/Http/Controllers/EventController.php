<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getList()
    {
        $events = \App\Event::all();
        return $events->makeHidden(['updated_at'])->toJson();
    }
}
