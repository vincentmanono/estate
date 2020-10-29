<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Lease;
use App\Rent;
use App\Property;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units=Unit::all();
        return view('units.index',compact('units'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request,[
            'name'=>'required',
            'water_acc_no'=>'string',
            'electricity_acc_no'=>'string',
            'service_charge'=>'string',
            'property_id'=>'required',
            'billing_cycle'=>'string'
        ]);

        $post = new Unit();

        $post->name =$request->name;
        $post->water_acc_no=$request->water_acc_no;
        $post->electricity_acc_no=$request->electricity_acc_no;
        $post->service_charge =$request->service_charge;
        $post->property_id=$request->property_id;
        $post->billing_cycle=$request->billing_cycle;

        $validate= $post->save();

        if($validate){
            return back()->with('success','You have successfully added the unit');
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
        $leases=Lease::all();
        $unit = Unit::find($id);
        $rents = Rent::all();
        return view('units.show',compact('unit','leases','rents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $this->validate($request,[
            'name'=>'required',
            'water_acc_no'=>'string',
            'electricity_acc_no'=>'string',
            'service_charge'=>'string',
            'property_id'=>'required',
            'billing_cycle'=>'string'
        ]);

        $post = Unit::find($id);

        $post->name =$request->name;
        $post->water_acc_no=$request->water_acc_no;
        $post->electricity_acc_no=$request->electricity_acc_no;
        $post->service_charge =$request->service_charge;
        $post->property_id=$request->property_id;
        $post->billing_cycle=$request->billing_cycle;

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
