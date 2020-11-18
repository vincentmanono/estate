<?php

namespace App\Http\Controllers;

use App\Unit;
use App\User;
use App\Water;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waters = Water::all();
        $user = User::where('id', Auth::user()->id)->first();

        // return view('waters.index',compact('waters'));

        if ( $user->isOwner()) {
            $waters = Water::latest()->get();
            $compact = compact('waters') ;
        } else if($user->isManager() ){
            $properties = Property::where('user_id',$user->id)->get();
            $compact = compact('properties') ;

        }else{
            $leases = $user->leases;
            $compact = compact('leases') ;

        }

        return view('waters.index',$compact)->with('param','Water billing records');





    }
    public function waterReport(){

        $waters = Water::latest()->get();
        return view('reports.waterreport',compact('waters'))->with('params','Water Record');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Water::class);
        $user = User::find(Auth::user()->id);
        if ($user->isOwner()) {
            $units = Unit::latest()->get();
            $compact = compact('units');

        } else {
            $properties = $user->properties;
            $compact = compact('properties');

        }

        return view('waters.createEdit',$compact)->with('param','Add Water Records');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'amount'=>['string','required'],
            'pay_date'=>['string','required'],
            'no_months'=>['string','required'],
            'read_date'=>['string','required'],
            'new_reading'=>['string','required'],
            'unit_id'=>['string','required']
        ]);

        $post =new Water();

        $post->amount= $request->amount;
        $post->pay_date= $request->pay_date;
        $post->no_months= $request->no_months;
        $post->read_date= $request->read_date;
        $post->new_reading= $request->new_reading;
        $post->unit_id= $request->unit_id;

        $validate=$post->save();

        if($validate){
            return back()->with('success','You have successfully added the water record.');
        }
        else{
            return back()->with('error','An error occured. Please try again!!!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $water = Water::find($id);
        return view('waters.show',compact('water'))->with('param','Water Details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $units = Unit::all();
        $water = Water::find($id);

        return view('waters.createEdit',compact('water','units'))->with('param','Edit Water Records');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,
        [
            'amount'=>['string','required'],
            'pay_date'=>['string','required'],
            'no_months'=>['string','required'],
            'read_date'=>['string','required'],
            'new_reading'=>['string','required'],
            'unit_id'=>['string','required']
        ]);

        $post = Water::find($id);

        $post->amount= $request->amount;
        $post->pay_date= $request->pay_date;
        $post->no_months= $request->no_months;
        $post->read_date= $request->read_date;
        $post->new_reading= $request->new_reading;
        $post->unit_id= $request->unit_id;

        $validate=$post->save();

        if($validate){
            return back()->with('success','You have successfully updated  the water record.');
        }
        else{
            return back()->with('error','An error occured. Please try again!!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $del = Water::find($id);

        $del->delete();

        if($del){
            return redirect()->route('water.index')->with('success','You have successfully deleted the record');
        }
        else{
            return back()->with('error','An error occured. Try again!!!');
        }
    }
    public function waterReadingUpdate(Request $request,$unitId ){
        $unit = Unit::findOrFail($unitId);
        $waterBillRate = $unit->property->water_bill_rate ;
        $lastReading = Water::where('unit_id',$unit->id)->latest()->first();
        $usedwater = intval($request->new_reading ) - intval( $lastReading->new_reading) ;
        $amountToPay =  $waterBillRate * $usedwater ;
        $request->request->add(['amount'=>$amountToPay,'previous_reading'=>$lastReading->new_reading]);
        $unit->waters()->create($request->all());
        return back()->with('success','You have successfully new water record');
    }

    public function waterPayment(Request $request, $waterId ){
        $water = Water::findOrFail($waterId);

        if ( $water->amount > $request->amount ) {
           $request->session()->flash('error', "The Paid amount is less than expected amount");
           return back();
        }

        $water->update([
            'paid'=>1,
            'pay_date'=> now()
        ]);
        return back()->with('success','You have successfully water payment');
    }
}
