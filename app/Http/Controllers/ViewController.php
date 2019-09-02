<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Morilog\Jalali\CalendarUtils;

class ViewController extends Controller
{
    //
    public function index()
    {
        $events = \App\Event::where('indexed', true)->get();
        return view('index', ['events' => $events]);
    }

    public function event($id)
    {
        $event = \App\Event::find($id);
        $sanse = array();
        foreach ($event->eventtimes as $eventtime) {
            $startday = Jalalian::forge($eventtime->start)->format('%A, %d %B %y');
            $startday = CalendarUtils::convertNumbers($startday);
            $starttime = Jalalian::forge($eventtime->start)->format('%H:%M');
            $starttime = CalendarUtils::convertNumbers($starttime);
            $endtime = Jalalian::forge($eventtime->end)->format('%H:%M');
            $endtime = CalendarUtils::convertNumbers($endtime);
            array_push($sanse, array('id' => $eventtime->id, 'startday' => $startday, 'starttime' => $starttime, 'endtime' => $endtime,));
        }
        return view('event', ['event' => $event, 'sanse' => $sanse]);
    }

    public function signup()
    {
        return view('signup');
    }

}
