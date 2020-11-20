<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Unit;
use App\User;
use App\Lease;
use App\Branch;
use App\Deposit;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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


        {
            if (Auth::user()->type == 'owner')
            {
                    $propertycount = Property::all()->count();
                    $branchcount = Branch::all()->count();
                    $leasecount= Unit::where('status',1)->count();
                    $unleasecount= Unit::where('status',0)->count();
                    $depositsum = Deposit::where('status',"Active")-> pluck('amount')->sum();
                    $properties = Property::orderBy('id','desc')->paginate(10);
                    $managers = User::where('type','manager')->paginate(3);

                    $now =Carbon::now()->format('Y-m-d H:i:s');
                    // $prev = Carbon::now()->subMonth(1)->format('Y-m-d H:i:s');
                    $rentsum = Rent::where('expiry_date','>',$now)->pluck("amount")->sum();

                    return view('home',compact('propertycount','properties','depositsum','rentsum','managers','branchcount','leasecount','unleasecount'))->with('param',Auth::user()->type);
            }
            elseif(Auth::user()->type =='manager')
            {

                $properties = Property::orderBy('id','desc')->paginate(10);
                $propertiescount=Auth::user()->properties->count();
                $unitscount=Unit::where('property_id',Auth()->user()->id)->count();
                $vacantunit=Unit::where('property_id',Auth()->user()->id)->where('status','0')->count();
                $occupiedunit=Unit::where('property_id',Auth()->user()->id)->where('status','1')->count();
                $managerproperties=Property::where('user_id',Auth::user()->id)->latest()->paginate(6);

                return view('manager',compact('properties','propertiescount','unitscount','vacantunit','occupiedunit','managerproperties'))->with('param',Auth::user()->type);

            }
            elseif(Auth::user()->type == 'tenant')
            {

                $leases = Lease::all();
                $rents = Rent::all();
                return view('tenant',compact('leases','rents'))->with('param',Auth::user()->type);

            }
        }

    }

}


