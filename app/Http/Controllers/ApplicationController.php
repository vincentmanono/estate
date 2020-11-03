<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\Property;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications =Application::all();
        // $properties =Property::all();

        return view('apprequest.index',compact('applications'));

    }
    public function approve(Request $request,$id){
       $this->validate($request,[
           'status'=>['required']
       ]);
       $post = Application::find($id);

       $post->status=$request->status;

       $validate=$post->save();
       if($validate){
           return redirect()->route('home');
       }

     }
     public function decline($id){
        $appreq = Application::findOrFail($id);
        $appreq->status = 0;
        $appreq->save();
        return redirect()->back();
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
