<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SaeedVaziry\Payir\Exceptions\SendException;
use SaeedVaziry\Payir\Exceptions\VerifyException;
use SaeedVaziry\Payir\PayirPG;
use Carbon\Carbon;


class Payment extends Model
{
    public function getUrl() {
        $payir = new PayirPG();
        $payir->amount = $this->amount; // Required, Amount
        $payir->factorNumber = (string)$this->id; // Optional
        $payir->description = 'Some Description'; // Optional
        $payir->mobile = $this->user()->phone; // Optional, If you want to show user's saved card numbers in gateway

        try {
            $payir->send();

            return $payir->paymentUrl;
        } catch (SendException $e) {
            throw $e;
        }
    }

    public function user() {
        return \App\User::find($this->user_id);
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
}
