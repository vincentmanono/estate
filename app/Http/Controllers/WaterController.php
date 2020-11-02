<?php

namespace App\Http\Controllers;

use App\Water;
use App\Unit;
use Illuminate\Http\Request;

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
        return view('waters.index',compact('waters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units =Unit::all();
        return view('waters.createEdit',compact('units'))->with('param','Add Water Records');
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
        return view('waters.show',compact('water'));
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
}
