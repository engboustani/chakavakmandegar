<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class EventtimeController extends Controller
{
    public function getList()
    {
        $eventtimes = \App\Eventtime::latest()->get();

        return $eventtimes->makeHidden(['updated_at', 'created_at'])->toJson();
    }

    public function getEventtime($id)
    {
        $eventtime = \App\Eventtime::find($id);
        return $eventtime->toJson();
    }

    public function getEventtimeEdit($id)
    {
        $eventtime = \App\Eventtime::find($id);
        return $eventtime->toJson();
    }

    public function getEventtimeInfo($id)
    {
        $eventtime = \App\Eventtime::find($id);
        $event = $eventtime->event;

        return response()->json([
            'title' => $event->title,
            'start' => Carbon::parse(
                $eventtime->start
            )->toDateTimeString()
        ]);
    }

    public function new(Request $request)
    {
        $eventtime = new \App\Eventtime;

        $eventtime->start = $request->start;
        $eventtime->end = $request->end;
        $eventtime->deadline = $request->limit;
        $eventtime->enable = $request->enable;
        $eventtime->event_id = $request->event_id;

        $seats = $request->seats;

        $eventtime->save();

        foreach ($seats as $value) {
            $seat = new \App\Seat;
            
            $seat->number = $value['number'];
            $seat->price = $value['price'];
            if(isset($value['reserved']))
                $seat->reserved = $value['reserved'];
            if(isset($value['capacity_fullness']))
                $seat->capacity_fullness = $value['capacity_fullness'];
            $seat->eventtime_id = $eventtime->id;

            $seat->save();            
        }

        return response()->json([
            'id' => $eventtime->id
        ], 201);
    }

    public function update(Request $request)
    {
        $eventtime = \App\Eventtime::find($request->id);

        $eventtime->start = $request->start;
        $eventtime->end = $request->end;
        $eventtime->deadline = $request->limit;
        $eventtime->enable = $request->enable;

        $eventtime->save();

        $seats = $request->seats;

        foreach ($seats as $value) {
            $seat = \App\Seat::find($value['id']);
            
            $seat->number = $value['number'];
            $seat->price = $value['price'];
            if(isset($value['reserved']))
                $seat->reserved = $value['reserved'];
            if(isset($value['capacity_fullness']))
                $seat->capacity_fullness = $value['capacity_fullness'];

            $seat->save();            
        }

        return response()->json([
            'id' => $eventtime->id
        ], 200);
    }

}
