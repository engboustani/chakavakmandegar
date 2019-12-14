<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Validator;

class ShopController extends Controller
{
    //
    public function selectSeat($id)
    {
        return view('shop', ['id' => $id]);
    }

    public function payFactorView($id)
    {
        $factor = \App\Factor::find($id);
        if($factor != null)
        {
            if($factor->paid_by == null)
            {
                return view('payfactor', ['id' => $id]);
            }
            return redirect('');
        }
        return redirect('');
    }

    public function printFactor($id)
    {
        return view('printfactor', ['id' => $id]);
    }

    public function getFactor(Request $request)
    {
        $user = Auth::user();
        $collection = \App\Seat::whereIn('number', $request->seats)->where('eventtime_id', $request->eventtime_id)->orderBy('created_at', 'desc')->get();
        $discount_per = 0;
        $discount_status = 1;
        if($request->discount_code != '')
        {
            $discount = \App\Discount::where('code', $request->discount_code)->first();
            if($discount != null)
            {
                if ($user != null) {
                    if($discount->factors->where('user_id', $user->id)->count() != 0)
                    {
                        $discount_status = -2;
                    }
                }
                if(($discount->used_count >= $discount->use_count)
                    && (Carbon::now() >= $discount->expired_at))
                {
                    $discount_status = -3;
                }
                if($discount_status == 1)
                {
                    $discount_per = $discount->percentage;
                }
            }
            else
            {
                $discount_status = -1;
            }
        }
        else
        {
            $discount_status = 0;
        }
        $array = array();
        $sumprice = 0;
        $discount_value = 0;
        $totalprice = 0;
        foreach ($collection as $key => $seat) {
            $row = [
                'id' => $seat->id,
                'price' => $seat->price,
            ];
            array_push($array, $row);
            $sumprice += $seat->price;
            $discount_value = $sumprice * ($discount_per / 100);
            $totalprice = $sumprice - $discount_value;
        }
        return response()->json([
            'seats' => $array,
            'sum' => $sumprice,
            'discount_per' => $discount_per,
            'discount_value' => $discount_value,
            'discount_status' => $discount_status,
            'total' => $totalprice
        ], 200);
    }

    public function getSeats($id)
    {
        $tickets = \App\Ticket::where('eventtime_id', $id)->get();
        $array = array();
        foreach ($tickets as $key => $ticket) {
            array_push($array, $ticket->seat->number);
        }
        $seats = \App\Seat::where('eventtime_id', $id)
            ->where(function($q) {
                $q->where('reserved', true)
                ->orWhere('capacity_fullness', true);
            })
            ->get();
        foreach ($seats as $key => $seat) {
            array_push($array, $seat->number);
        }
    
        return response()->json([
            'reserved' => $array,
        ], 200);
    }

    public function makeFactor(Request $request)
    {
        if($this->checkSeats($request->tickets))
        {
            $factor = new \App\Factor;

            $user = Auth::user();
            if ($user == null) {
                $validator = Validator::make($request->user, [
                    'firstname' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'iranid' => ['required', 'string', new \App\Rules\Iranian],
                    'phone' => ['required', 'string', new \App\Rules\IranPhone],
                ]);
        
                if ($validator->fails()) {
                    return response()->json([
                        'msg' => $validator,
                    ], 500);
                }

                $user = \App\User::where('iranid', $request->user['iranid'])->first();
                if ($user == null) {
                    $user = \App\User::where('phone', $request->user['phone'])->first();
                    if ($user == null) {
                        $user = new \App\User([
                            'firstname' => $request->user['firstname'],
                            'lastname' => $request->user['lastname'],
                            'iranid' => $request->user['iranid'],
                            'phone' => $request->user['phone'],
                            'password' => Hash::make(Str::random(10))
                        ]);
                
                        $user->save();                                        
                    }
                }
            }
            $factor->user_id = $user->id;
            
            if(isset($request->discount_code) && $request->discount_code != '')
            {
                $discount = \App\Discount::where('code', $request->discount_code)->first();
                if($discount != null)
                {
                    if(($discount->factors->where('user_id', $factor->user_id)->count() == 0)
                        && ($discount->used_count < $discount->use_count)
                        && (Carbon::now() < $discount->expired_at))
                    {
                        $factor->discount_id = $discount->id;
                    }
                }
            }
    
            try {
                $factor->save();
                foreach ($request->tickets as $key => $seat) {
                    $ticket = new \App\Ticket;
                    $seatElq = \App\Seat::find($seat['id']);
    
                    $ticket->seat_id = $seat['id'];
                    $ticket->user_id = $factor->user_id;
                    $ticket->firstname = $user->firstname;
                    $ticket->lastname = $user->lastname;
                    $ticket->phone = $user->phone;
                    $ticket->eventtime_id = $seatElq->eventtime_id;
                    $ticket->factor_id = $factor->id;
    
                    $ticket->save();
                }
    
            }
            catch(Exception $e)
            {
                return response()->json([
                    'error' => $e,
                ], 500);
    
            }
            return response()->json([
                'factor_id' => $factor->id,
            ], 201);
        }
        else
        {
            return response()->json([
                'error' => 'Tickets reserved!',
            ], 500);
        }
    }

    public function payFactor(Request $request)
    {
        $factor = \App\Factor::find($request->factor_id);

        if($factor->user_id == Auth::id())
        {
            if($this->checkEquity($factor))
            {
                // if account has equity for payment
                $charge_id = $this->discharge($factor);
                $factor->paid_by = $charge_id;
                $factor->save();
                
                return response()->json([
                    'status' => 1,
                    'msg' => "با موفقیت پرداخت شد"
                ], 200);
            }
            else
            {
                // if account needs to charge
                $amount = $factor->bill - $factor->user->credit;
                $url = $this->newPayment($factor, $amount);

                return response()->json([
                    'status' => 2,
                    'payment_url' => $url,
                ], 200);
            }
        }
    }

    private function checkSeats($seats)
    {
        $count_tickets = \App\Ticket::whereIn('seat_id', array_column($seats, 'id'))->count();
        if($count_tickets > 0)
            return false;
        else
            return true;
    }

    private function checkEquity($factor)
    {
        $equity = $factor->user->credit;
        $bill = $this->factorBill($factor);
        if($equity >= $bill)
            return true;
        else
            return false;
    }

    private function factorBill($factor)
    {
        $discount_per = 0;
        $sumprice = 0;
        $discount_value = 0;
        $totalprice = 0;
        if($factor->discount_id != null)
        {
            $discount = \App\Discount::find($factor->discount_id);
            if(($discount->factors->where('user_id', Auth::id())->count() == 0)
                && ($discount->used_count <= $discount->use_count)
                && (Carbon::now() <= $discount->expired_at))
            {
                $discount_per = $discount->percentage;
            }
        }
        foreach ($factor->tickets as $key => $ticket) {
            $sumprice += $ticket->seat->price;
        }
        $discount_value = $sumprice * ($discount_per / 100);
        $totalprice = $sumprice - $discount_value;

        return $totalprice;
    }

    private function discharge($factor)
    {
        $charge = new \App\Charge;

        $charge->type = 2;
        $charge->user_id = $factor->user_id;
        $charge->amount = -1 * $this->factorBill($factor);
        $charge->factor_id = $factor->id;

        $charge->save();

        return $charge->id;
    }

    private function newPayment($factor, $amount)
    {
        $payment = new \App\Payment;

        $payment->method = 1;
        $payment->user_id = $factor->user_id;
        $payment->submited_by = 1;
        $payment->amount = $amount;
        $payment->factor_id = $factor->id;
        $payment->description = "پرداخت فاکتور #{$factor->id}";

        $payment->save();

        try {
            $url = $payment->getUrlFactor($factor);
            return $url;    
        }
        catch(SendException $e)
        {
            return $e; 
        }
    }


}
