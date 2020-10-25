<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Unit;
use App\User;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits=Deposit::all();
        return view('deposits.index',compact('deposits'));
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
        return view('deposits.createEdit',compact('units','tenants'))->with('param','Add deposit Records');
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

            'amount'=>['string','required'],
            'date'=>['string','required'],
            'user_id'=>['required'],
            'unit_id'=>['string','required'],
            'status'=>['string','required']

        ]);

        $post = new Deposit();

        $post->amount =$request->amount;
        $post->date =$request->date;
        $post->user_id=$request->user_id;
        $post->unit_id=$request->unit_id;
        $post->status=$request->status;

        $validate=$post->save();

        if($validate){
            return back()->with('success','You have successfully added the deposit record');
        }
        else{
            return back()->with('error','An error occured. Please try again!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $deposit = Deposit::find($id);
        return view('deposits.show',compact('deposit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = Unit::all();
        $tenants = User::where('type','tenant')->get();
        $deposit=Deposit::find($id);

        return view('deposits.createEdit',compact('deposit','units','tenants'))->with('param','Edit Deposit Records');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[

            'amount'=>['string','required'],
            'date'=>['string','required'],
            'user_id'=>['required'],
            'unit_id'=>['string','required'],
            'status'=>['string','required']

        ]);

        $post =  Deposit::find($id);

        $post->amount =$request->amount;
        $post->date =$request->date;
        $post->user_id=$request->user_id;
        $post->unit_id=$request->unit_id;
        $post->status=$request->status;

        $validate=$post->save();

        if($validate){
            return back()->with('success','You have successfully updated the deposit record');
        }
        else{
            return back()->with('error','An error occured. Please try again!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Deposit::find($id);
        $del->delete();

        if($del){
            return redirect()->route('deposit.index')->with('success','You have successfully deleted the deposit record.');
        }
        else{
            return back()->with('error','An error occured. Please try again!!!');
        }
    }
}
