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
        $depositsum = Deposit::where('status',1)-> pluck('amount')->sum();
        $properties = Property::orderBy('id','desc')->paginate(10);
        $managers = User::where('type','manager')->paginate(3);

        $now =Carbon::now();

        $prev = $now->subMonths(1);
        $rentsum = Rent::where('date','>', $prev )->pluck("amount")->sum();

        return view('home',compact('propertycount','properties','depositsum','rentsum','managers','branchcount','leasecount','unleasecount'));
    }

}
