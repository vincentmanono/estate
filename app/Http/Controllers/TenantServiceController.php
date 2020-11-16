<?php

namespace App\Http\Controllers;

use App\Unit;
use App\User;
use App\Lease;
use App\Property;
use App\TenantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = User::where('id', Auth::user()->id)->first();
        if ( $user->isOwner() || $user->isTenant() ) {
            $allServicesRequests = TenantService::latest()->get();
            $specificTenantRequests = TenantService::latest()->where('user_id',$user->id)->get();

            $services =  ($user->isOwner()) ? $allServicesRequests : $specificTenantRequests ;

            $compact = compact('services') ;

        } else {
            $properties = $user->properties ;
            $compact = compact('properties') ;

        }


        return view('tenantservice.index',$compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leases = Auth::user()->leases ;
        return view('tenantservice.create',compact('leases')) ->with('param','Create Tenant Request') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'message'=>['required'],
            'unit_id'=>['required']
        ]);

        $post = new TenantService();

        $post->user_id= Auth::user()->id ;
        $post->unit_id=$request->unit_id;
        $post->message=$request->message;

        $validate=$post->save();

        if($validate){
            return redirect()->route('tenantservice.index')->with('success','Your request has been successfully sent.We shall get back to you soon.');
        }
        else{
             return redirect()->back()->withErrors($validator)->withInput();
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
    public function edit($id)
    {
        $service = TenantService::findOrFail($id) ;
        return view('tenantservice.create',compact('service')) ->with('param','Edit Tenant Request') ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TenantService  $tenantService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = TenantService::findOrFail($id) ;
        $service->update($request->all());
        $request->session()->flash('success', "You service request updated");
        return redirect()->route('tenantservice.index') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TenantService  $tenantService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = TenantService::findOrFail($id) ;
        $service->delete();

        return redirect()->route('tenantservice.index')->with('success', "Service request deleted");

    }

    public function changestatus(Request $request , $id )
    {
        $service = TenantService::findOrFail($id) ;
        $service->update($request->all());
        $request->session()->flash('success', "Service request status updated");
        return redirect()->route('tenantservice.index') ;

    }
}
