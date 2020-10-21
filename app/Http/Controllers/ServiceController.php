<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services =Service::orderBy('id','Desc')->get();
        return view('services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.createEdit')->with('param','Add Service');
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

            'name'=>'string',
            'phone'=>'string',
            'email'=>'email',
            'type'=>'string',

        ]);

        $post = new Service();

        $post->name=$request->name;
        $post->phone=$request->phone;
        $post->email=$request->email;
        $post->type=$request->type;

        $validate=$post->save();

        if($validate){
            return \redirect()->route('service.index')->with('success','You have successsfully added the service');
        }else{
            return back()->with('error','An error occured while adding the details');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service  =Service::find($id);
        return view('services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=Service::find($id);
        return view('services.createEdit',compact('service'))->with('param','Edit Service');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[

            'name'=>'string',
            'phone'=>'string',
            'email'=>'email',
            'type'=>'string',

        ]);

        $post = Service::find($id);

        $post->name=$request->name;
        $post->phone=$request->phone;
        $post->email=$request->email;
        $post->type=$request->type;

        $validate=$post->save();

        if($validate){
            return \redirect()->route('service.index')->with('success','You have successsfully updated the service');
        }else{
            return back()->with('error','An error occured while updating the details');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del =Service::find($id);
        $del->delete();

        if($del){
            return \redirect()->route('service.index')->with('success','You have succesfully deleted the record');
        }
        else{
            return back()->with('error','An error occured. Try again');
        }
    }
}
