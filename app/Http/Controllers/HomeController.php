<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use App\Property;
use App\Deposit;
use App\Lease;
use App\Rent;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $propertycount = Property::all()->count();
        $branchcount = Branch::all()->count();
        $leasecount= Lease::where('status','active')->count();
        $unleasecount= Lease::where('status','inactive')->count();
        $depositsum = Deposit::where('status',"Active")-> pluck('amount')->sum();
        $properties = Property::orderBy('id','desc')->paginate(10);
        $managers = User::where('type','manager')->paginate(3);

        $now =Carbon::now()->format('Y-m-d H:i:s');
        // $prev = Carbon::now()->subMonth(1)->format('Y-m-d H:i:s');
        $rentsum = Rent::where('expiry_date','>',$now)->pluck("amount")->sum();

        return view('home',compact('propertycount','properties','depositsum','rentsum','managers','branchcount','leasecount','unleasecount'));
    }

}
