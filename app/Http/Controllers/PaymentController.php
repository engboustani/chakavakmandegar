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
            $payment->chargeUser();

            return redirect("/shop/15");
        } catch (VerifyException $e) {
            return redirect("/shop/15?paymentfailed=1");
        }
    }

    public function payirVerifyFactor(Request $request, $factor_id)
    {
        $payir = new PayirPG();
        $payir->token = $request->token; // Pay.ir returns this token to your redirect url

        try {
            $verify = $payir->verify(); // returns verify result from pay.ir like (transId, cardNumber, ...)
            $payment = \App\Payment::where('token', $payir->token)->first();
            $payment->description = sprintf('شارژ حساب توسط کارت %s برای فاکتور %u', $verify["cardNumber"], $factor_id);
            $payment->token = $payir->token;
            $payment->verified_at = Carbon::now()->toDateTimeString();
            $payment->save();
            $payment->chargeUser();

            return redirect("/payfactor/{$factor_id}");
        } catch (VerifyException $e) {
            return redirect("/payfactor/{$factor_id}");
        }
    }

    public function payirVerifyCourse(Request $request, $course_id)
    {
        $payir = new PayirPG();
        $payir->token = $request->token; // Pay.ir returns this token to your redirect url

        try {
            $verify = $payir->verify(); // returns verify result from pay.ir like (transId, cardNumber, ...)
            $payment = \App\Payment::where('token', $payir->token)->first();
            $payment->description = sprintf('شارژ حساب توسط کارت %s برای %s', $verify["cardNumber"], $payment->description);
            $payment->token = $payir->token;
            $payment->verified_at = Carbon::now()->toDateTimeString();
            $payment->save();
            $payment->chargeUser();

            return redirect("/course/{$course_id}?gosign=1");
        } catch (VerifyException $e) {
            return redirect("/course/{$course_id}?error=1");
        }
    }

    public function getLast5()
    {
        return \App\Payment::latest()->take(5)->get()->makeVisible(['username'])->makeHidden(['submited_by', 'factor_id', 'token', 'verified_at', 'updated_at', 'user'])->toJson();
    }

    public function getList()
    {
        return \App\Payment::latest()->get()->makeVisible(['username'])->makeHidden(['submited_by', 'factor_id', 'token', 'updated_at', 'user'])->toJson();
    }

    public function getListUser()
    {
        $userid = Auth::id();
        return \App\Payment::where('user_id', $userid)->latest()->get()->makeHidden(['submited_by', 'factor_id', 'token', 'updated_at', 'user', 'username'])->toJson();
    }
}
