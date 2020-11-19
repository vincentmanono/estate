<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments =Payment::all();
        return view('payments.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
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

            'type'=>['required'],
            'number'=>['required'],

        ]);

        $post = new Payment();

        $post->type=$request->type;
        $post->number=$request->number;

        $validate=$post->save();

        if($validate){
            return back()->with('success','The payment record was successfully added');

        }
        else{
            return back()->with('error','An error occured. Please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
       $payment=Payment::find($id);
       return view('payments.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[

            'type'=>['required'],
            'number'=>['required'],

        ]);

        $post =  Payment::find($id);

        $post->type=$request->type;
        $post->number=$request->number;

        $validate=$post->save();

        if($validate){
            return back()->with('success','Payment record updated successfully');

        }
        else{
            return back()->with('error','An error occured. Please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Payment::find($id);

        $del->delete();

        if($del){
            return redirect()->route('payment.index')->with('success','You have successfully deleted the record');
        }
        else{
            return back()->with('error','An error occured. Please try again');
        }
    }
}
