<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function getList()
    {
        $tickets = \App\Ticket::latest()->get();
        $array = array();
        foreach ($tickets as $key => $ticket) {
            array_push($array, array('id' => $ticket->id, 'name' => $ticket->fullname, 'title' => $ticket->event_name, 'time' => $ticket->eventtime_start, 'seat' => $ticket->seat->number));
        }

        return response()->json($array, 200);
    }
    public function getListUser(Request $request)
    {
        $userid = Auth::id();
        $tickets = \App\Ticket::where('user_id', $userid)->latest()->get();

        return $tickets->toJson();
    }
}
