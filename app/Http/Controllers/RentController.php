<?php

namespace App\Http\Controllers;

use App\Rent;
use App\User;
use App\Unit;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents=Rent::all();
        return view('rents.index',compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $tenants = User::where('type','tenant')->get();
        return view('rents.createEdit',compact('units','tenants'))->with('param','Add Rent Records');
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

            'amount'=>'required',
            'no_months'=>'required',
            'unit_id'=>'required',
            'user_id'=>'required',
            'description'=>'required',
            'date'=>'required',
        ]);

        $post = new Rent();

        $post->amount =$request->amount;
        $post->no_months =$request->no_months;
        $post->unit_id =$request->unit_id;
        $post->description =$request->description;
        $post->user_id =$request->user_id;
        $post->date =$request->date;

        $validate=$post->save();

        if($validate){

            return back()->with('success','You have successfully added the rent record.');
        }else{
            return back()->with('error','An error occured. Please try again!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rents=Rent::all();
        $rent = Rent::find($id);
        return view('rents.show',compact('rent','rents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = Unit::all();
        $tenants = User::where('type','tenant')->get();
        $rent = Rent::find($id);
        return view('rents.createEdit',compact('rent','units','tenants'))->with('param','Edit Rent Details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'amount'=>'required',
            'no_months'=>'required',
            'unit_id'=>'required',
            'user_id'=>'required',
            'description'=>'required',
            'date'=>'required',
        ]);

        $post = Rent::find($id);

        $post->amount =$request->amount;
        $post->no_months =$request->no_months;
        $post->unit_id =$request->unit_id;
        $post->description =$request->description;
        $post->user_id =$request->user_id;
        $post->date =$request->date;

        $validate=$post->save();

        if($validate){

            return back()->with('success','You have successfully updated the rent record.');
        }else{
            return back()->with('error','An error occured. Please try again!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del =Rent::find($id);
        $del->delete();

        if($del){
            return redirect()->route('rent.index')->with('success','You have successfully deleted the record');
        }
        else{
            return back()->with('error','An error occured. Please try again!!!');
        }
    }
}
