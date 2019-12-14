<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use App\User;
use App\Rules\Iranian;
use App\Rules\IranPhone;

class AuthController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'iranid' => ['required', 'string', 'unique:users', new Iranian],
            'phone' => ['required', 'string', 'unique:users', new IranPhone],
            'password' => 'required|string|confirmed',
            'captcha' => 'required|captcha_api:' . $request->ckey
        ]);

        $user = new User([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'iranid' => $request->iranid,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $user->save();

        $role = \App\Role::where('name', 'client')->first();
        $user->attachRole($role);

        // \Ipecompany\Smsirlaravel::send(['با سلام! شما با موفقیت در چکاوک ماندگار ثبت نام کردید.'],[$user->phone]);

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
                    
        $token->save();

        return response()->json([
            'message' => 'Successfully created user!',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ], 201);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] username
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $login_type = preg_match('/^09[0-9]{9}$/', $request->input('login'))
            ? 'phone' 
            : 'iranid';

        $request->merge([
            $login_type => $request->input('login')
        ]);
        
        if(!Auth::attempt($request->only($login_type, 'password'), $request->remember_me))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
            
        $user = $request->user();
        
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
            
        $token->save();
            
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
    
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
