<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Unit;
use App\User;
use App\Lease;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Unit::class);
        $user = User::where('id', Auth::user()->id)->first();
        $units = [] ;
        if ( $user->isOwner()) {
            $units=Unit::latest()->get();
            return view('units.index',compact('units'))->with('param','owner');

        } else if($user->isManager() ){
            $properties = Property::where('user_id',$user->id)->get();


            return view('units.index',compact('properties'))->with('param','manager');
        }else{
            Session::flash("error","You do not have permission to access this route") ;
         return redirect()->back() ;
        }




    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Unit::class);

        $properties =Property::all();
        return view('units.createEdit',compact('properties'))->with('param','Add New Unit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Unit::class);

        $this->validate($request,[
            'name'=>'required',
            'water_acc_no'=>'string',
            'electricity_acc_no'=>'string',
            'service_charge'=>'string',
            'property_id'=>'required',
            'billing_cycle'=>'string',
            'rent'=> 'required',
            'status'=>'required'
        ]);


        $unit = Unit::create($request->all());

        if($unit){
            return redirect()->route('unit.show',$unit)  ->with('success','You have successfully added the unit');
        }
        else{
            return back()->with('error','An error occured and the unit was not added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit =  Unit::findOrFail($id);

        $this->authorize('view',$unit);
        $leases= $unit->leases ;
        $rents = Rent::where('unit_id',$id)->orderBy('id','desc')->get() ;
        return view('units.show',compact('unit','leases','rents'))->with('param','Single Unit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit =  Unit::findOrFail($id);

        $this->authorize('update',$unit);
        $unit = Unit::find($id);
        $properties =Property::all();
        return view('units.createEdit',compact('unit','properties'))->with('param','Edit Unit Details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit =  Unit::findOrFail($id);

        $this->authorize('update',$unit);

        $this->validate($request,[
            'name'=>'required',
            'water_acc_no'=>'string',
            'electricity_acc_no'=>'string',
            'service_charge'=>'string',
            // 'property_id'=>'required',
            'billing_cycle'=>'string'
        ]);

        $post = Unit::find($id);

        $post->name =$request->name;
        $post->water_acc_no=$request->water_acc_no;
        $post->electricity_acc_no=$request->electricity_acc_no;
        $post->service_charge =$request->service_charge;
        // $post->property_id=$request->property_id;
        $post->billing_cycle=$request->billing_cycle;
        $post->rent=$request->rent;
        $post->status=$request->status;

        $validate= $post->save();

        if($validate){
            return back()->with('success','You have successfully Updated the unit records');
        }
        else{
            return back()->with('error','An error occured while updating the unit records.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit =  Unit::findOrFail($id);

        $this->authorize('delete',$unit);
        $del = Unit::find($id);
        $del->delete();

        if($del){
            return redirect()->route('unit.index')->with('success','You have successfully deleted the unit');
        }
        else{
            return redirect()->back()->with('error','An error occured while deleting the record.');
           }
    }
}
