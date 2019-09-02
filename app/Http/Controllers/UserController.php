<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getInfo() {
        $user = Auth::user();

        return response()->json([
            'fullname' => sprintf('%s %s', $user->firstname, $user->lastname),
            'credit' => DB::table('charges')
                            ->where('user_id', $user->id)
                            ->sum('amount'),
        ]);
    }
}
