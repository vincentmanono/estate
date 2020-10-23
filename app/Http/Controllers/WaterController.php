<?php

namespace App\Http\Controllers;

use App\Water;
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
        return view('waters.createEdit')->with('param','Add Water Records');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $water = Water::find($id);

        return view('waters.createEdit',compact('water'))->with('param','Edit Water Records');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Water $water)
    {
        //
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
