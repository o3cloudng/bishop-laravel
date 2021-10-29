<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubTransaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $users = DB::table('users')
                    ->where('role', '<', 10)
                    ->get();
        $noOfUsers = count($users);
        $activeUsers = DB::table('sub_transactions')
                ->select('user_id')
                ->where('subscription_end_time', '>', Carbon::now())
                ->where('user_id', '!=', 1)
                ->distinct()
                ->get();
        $activeUsers = count($activeUsers);

        $sales = DB::table('sub_transactions')
                ->select('amount')
                ->get();

        $total = DB::table('sub_transactions')
                ->sum('amount');

        $dtranx = DB::table('sub_transactions AS s')
            ->select([
                's.user_id', 's.amount', 's.reference', 's.subscription_end_time', 's.created_at', 's.status', 'u.name', 'u.email'
            ])->join('users as u', 's.user_id', '=', 'u.id')
            ->where('u.role', '<', 10)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        // dd($dtranx);

        return view('dashboard', ['noOfUsers' => $noOfUsers, 'activeUsers'=> $activeUsers, 'sales' => $sales, 'total' => $total, 'dtranx'=>$dtranx ]);
    }
}
