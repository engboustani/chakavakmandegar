<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function getLastMonthPayments()
    {
        $list = \App\Payment::where('created_at', '>=', Carbon::now()->subMonth())
            ->whereNotNull('verified_at')
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get(array(
                DB::raw('Date(created_at) as date'),
                DB::raw('SUM(amount) as "sum"')
            ));
        return $list->makeHidden(['user', 'username'])->toJson();
    }

    public function dashboardInfo()
    {
        $user_count = \App\User::count();
        $payment = \App\Payment::where('created_at', '>=', Carbon::now()->subMonth())
            ->whereNotNull('verified_at')
            ->get(array(
                DB::raw('COUNT(*) AS "count"'),
                DB::raw('SUM(amount) AS "sum"')
            ))->first();
        $event_count = \App\Event::where('indexed', true)->count();
        $ticket_count = \App\Payment::where('created_at', '>=', Carbon::now()->subMonth())
            ->count();

        return response()->json([
            'user_count' => $user_count,
            'payment' => $payment,
            'event_count' => $event_count,
            'ticket_count' => $ticket_count,
        ], 200);
    }
}
