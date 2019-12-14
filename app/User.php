<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable, HasApiTokens, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'iranid', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    protected $appends = ['credit', 'fullname'];

    /**
     * Get all of the charges for the user.
     */
    public function charges()
    {
        return $this->hasMany('App\Charge', 'user_id');
    }

    /**
     * Get all of the charges for the user.
     */
    public function payments()
    {
        return $this->hasMany('App\Payment', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'course_user');
    }

    public function getCreditAttribute()
    {
        return DB::table('charges')
        ->where('user_id', $this->id)
        ->sum('amount');
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}
