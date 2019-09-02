<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SaeedVaziry\Payir\Exceptions\SendException;
use SaeedVaziry\Payir\Exceptions\VerifyException;
use SaeedVaziry\Payir\PayirPG;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class PaymentController extends Controller
{
    public function payir(Request $request)
    {
        $payment = new \App\Payment;
        $payment->method = 1;
        $payment->user_id = Auth::id();
        $payment->submited_by = 1;
        $payment->amount = $request->amount;
        $payment->description = "شارژ حساب";
        $payment->token = "";
        
        $payment->save();

        try {
            $url = $payment->getUrl();

            return response()->json([
                'payir_url' => $url
            ]);
        } catch (SendException $e) {
            throw $e;
        }
    }

    public function payir_verify(Request $request)
    {
        $payir = new PayirPG();
        $payir->token = $request->token; // Pay.ir returns this token to your redirect url

        try {
            $verify = $payir->verify(); // returns verify result from pay.ir like (transId, cardNumber, ...)
            $payment = \App\Payment::find((int)$verify["factorNumber"]);
            $payment->description = sprintf('شارژ حساب توسط کارت %s', $verify["cardNumber"]);
            $payment->token = $payir->token;
            $payment->verified_at = Carbon::now()->toDateTimeString();
            $payment->save();

            return redirect("/shop/15");
        } catch (VerifyException $e) {
            throw $e;
        }
    }
}
