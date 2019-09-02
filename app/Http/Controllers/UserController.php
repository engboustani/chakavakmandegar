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
            'credit' => $user->credit,
        ]);
    }

    public function getList() {
        $users = \App\User::all()->where('deleted_at', null);
        return $users->makeHidden(['deleted_at', 'email_verified_token', 'phone_verified_token', 'created_at', 'updated_at'])->toJson();
    }
}
