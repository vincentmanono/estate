<?php

namespace App\Http\Controllers;

use App\TenantService;
use Illuminate\Http\Request;
use App\Unit;
use App\Lease;
use App\Property;
class TenantServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties =Property::all();

        return view('tenantservice.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $leases = Lease::all();
        return view('tenantservice.create',compact('units','leases'));
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

            'user_id'=>['required'],
            'property_id'=>['required'],
            'message'=>['required'],
            'unit_id'=>['required']

        ]);

        $post = new TenantService();

        $post->user_id=$request->user_id;
        $post->unit_id=$request->unit_id;
        $post->property_id=$request->property_id;
        $post->message=$request->message;

        $validate=$post->save();

        if($validate){
            return back()->with('success','Your request has been successfully sent.We shall get back to you soon.');
        }
        else{
            return \back()->with('error','An error occured while submitting your request! please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TenantService  $tenantService
     * @return \Illuminate\Http\Response
     */
    public function show(TenantService $tenantService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TenantService  $tenantService
     * @return \Illuminate\Http\Response
     */
    public function edit(TenantService $tenantService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TenantService  $tenantService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenantService $tenantService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TenantService  $tenantService
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenantService $tenantService)
    {
        //
    }
}
