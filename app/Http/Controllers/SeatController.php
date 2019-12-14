<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeatController extends Controller
{
    public function getSeat($eventtime_id, $number)
    {
        #find eventtime
        $eventtime = \App\Eventtime::find($eventtime_id);
        $seat = $eventtime->seat($number);

        return $seat->toJson();
    }

    public function getSeatInfo($eventtime_id, $number)
    {
        #find eventtime
        $eventtime = \App\Eventtime::find($eventtime_id);
        $seat = $eventtime->seat($number);
        $user = Auth::user();

        return response()->json([
            'id' => $seat->id,
            'price' => $seat->price,
            'reserved' => $seat->reserved,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'phone' => $user->phone,
        ]);

    }

    public function getSeatList($eventtime_id)
    {
        #find eventtime
        $seats = \App\Seat::where('eventtime_id', $eventtime_id)->get();

        return $seats->toJson();
    }

    public function getSeatSettingList()
    {
        #find eventtime
        $setting_seat = \App\SettingSeat::all();

        return $setting_seat->toJson();

    }

}
