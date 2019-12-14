<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function putSalon(Request $request)
    {
        $seats = $request->seats;

        foreach ($seats as $value) {
            $seat = \App\SettingSeat::where('number', $value['number'])->first();
            
            $seat->price = $value['price'];
            if(isset($value['reserved']))
                $seat->reserved = $value['reserved'];
            if(isset($value['capacity_fullness']))
                $seat->capacity_fullness = $value['capacity_fullness'];

            $seat->save();            
        }

        return response()->json([
            'status' => 'saved sucessfuly'
        ], 200);

    }
}
