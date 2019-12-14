<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SaeedVaziry\Payir\Exceptions\SendException;
use SaeedVaziry\Payir\Exceptions\VerifyException;
use SaeedVaziry\Payir\PayirPG;
use Carbon\Carbon;


class Payment extends Model
{
    protected $appends = ['username', 'verified'];

    public function getUrl() {
        $payir = new PayirPG();
        $payir->amount = $this->amount * 10; // Required, Amount
        $payir->factorNumber = (string)$this->id; // Optional
        $payir->description = 'Some Description'; // Optional
        $payir->mobile = $this->user->phone; // Optional, If you want to show user's saved card numbers in gateway

        try {
            $payir->send();

            return $payir->paymentUrl;
        } catch (SendException $e) {
            throw $e;
        }
    }

    public function getUrlFactor($factor) {
        $payir = new PayirPG();
        $payir->amount = $this->amount * 10; // Required, Amount
        $payir->redirect = url("/api/payment/factor/{$factor->id}"); // Required, Amount
        $payir->factorNumber = (string)$this->id; // Optional
        $payir->description = 'Some Description'; // Optional
        $payir->mobile = $this->user->phone; // Optional, If you want to show user's saved card numbers in gateway

        try {
            $payir->send();
            $this->token = $payir->token;
            $this->save();
            
            return $payir->paymentUrl;
        } catch (SendException $e) {
            throw $e;
        }
    }

    public function getUrlCourse($course) {
        $payir = new PayirPG();
        $payir->amount = $this->amount * 10; // Required, Amount
        $payir->redirect = url("/api/payment/course/{$course->id}"); // Required, Amount
        $payir->factorNumber = (string)$this->id; // Optional
        $payir->description = "پرداخت {$this->user->fullname} برای ورک‌شاپ {$course->title}"; // Optional
        $payir->mobile = $this->user->phone; // Optional, If you want to show user's saved card numbers in gateway

        try {
            $payir->send();
            $this->token = $payir->token;
            $this->save();
            
            return $payir->paymentUrl;
        } catch (SendException $e) {
            throw $e;
        }
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getUsernameAttribute() {
        if(isset($this->user))
        {
            return $this->user->fullname;
        }
        return '';
    }

    public function verification(string $token) {
        $this->token = $token;
        $this->save();
        $payir = new PayirPG();
        $payir->token = $this->token; // Pay.ir returns this token to your redirect url

        try {
            $verify = $payir->verify(); // returns verify result from pay.ir like (transId, cardNumber, ...)

            if($verify->status == 1) {
                $this->verified_at = Carbon::now()->toDateTimeString();
                $this->save();
            }
        } catch (VerifyException $e) {
            throw $e;
        }
    }

    public function chargeUser()
    {
        $charge = new \App\Charge;

        $charge->type = 1;
        $charge->user_id = $this->user_id;
        $charge->amount = $this->amount;

        $charge->save();

        return $charge;
    }

    public function getVerifiedAttribute()
    {
        if($this->verified_at == null)
            return false;
        return true;
    }
}
