<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventController extends Controller
{
    use SoftDeletes;

    public function getList()
    {
        $events = \App\Event::latest()->get();
        return $events->makeHidden(['updated_at', 'eventtime'])->toJson();
    }

    public function newEvent(Request $request)
    {
        $event = new \App\Event;

        $event->title = $request->title;
        $event->content = $request->content;
        $event->summery = $request->summery;
        $event->thumbnail_id = $request->thumbnail_id;
        $event->header_id = $request->header_id;

        $event->save();

        return response()->json([
            'id' => $event->id
        ], 201);
    }

    public function getEvent($id)
    {
        $event = \App\Event::find($id);

        return $event->toJson();
    }

    public function getEventTitle($id)
    {
        $event = \App\Event::find($id);

        if ($event != null) {
            return response()->json([
                'title' => $event->title
            ], 200);
        }
        else {
            return response()->json([
                'msg' => 'not found'
            ], 500);
        }
    }


    public function updateEvent(Request $request)
    {
        $event = \App\Event::find($request->id);

        $event->title = $request->title;
        $event->content = $request->content;
        $event->summery = $request->summery;
        $event->thumbnail_id = $request->thumbnail_id;
        $event->header_id = $request->header_id;

        $event->save();

        return response()->json([
            'id' => $request->id,
        ], 200);
    }

    public function deleteEvent(Request $request)
    {
        $event = \App\Event::find($request->id);

        $event->delete();

        return response()->json([
            'id' => $request->id,
        ], 200);
    }

}
