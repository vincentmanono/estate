<?php

namespace App\Http\Controllers;

use App\Unit;
use App\User;
use App\Lease;
use App\Property;
use App\TenantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TenantServiceRequestApprroved;

class TenantServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user =User::where('id',Auth::user()->id)->first();

        $this->authorize('viewAny',TenantService::class);
        if ($user->isOwner() || $user->isTenant()) {
            $services=TenantService::latest()->get();

            $requests = ($user->isOwner()) ? TenantService::latest()->paginate(30) :  $user->requests()->latest()->paginate(30) ;
            // dd($rents);
            $compact = compact('requests');

         } else {
            $properties = $user->properties;
            $compact = compact('properties');
        }
        return view('tenantservice.index',$compact)->with('param','Tenant Requests');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $leases = auth()->user()->leases ;
        return view('tenantservice.create',compact('leases'))->with('param','createRequestService');
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

            'message'=>['required'],
            'unit_id'=>['required'],


        ]);

        $post = new TenantService();

        $post->user_id=Auth::user()->id;//auth user id
        $post->unit_id=$request->unit_id;
        $post->message=$request->message;
        $post->status=2;

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
    public function show( $id)
    {
        $service =TenantService::findOrFail($id);
        $this->authorize('view',$service);
        return view('tenantservice\show',compact('service'))->with('param','Service');

        // return view('tenantservice.show',compact('service'));
    }

    public function acceptDecline(Request $request, $id){

        $this->validate($request, [
            'status' => ['required']
        ]);
        $service = TenantService::findOrFail($id);

        $this->authorize('acceptDecline',$service);

        $status = $request->status ;
        $service->update([
            'status' => $status
        ]);
        Mail::to($service->user->email)->send(new TenantServiceRequestApprroved($service));
        $response = ($status) ? "Request Approved" : "Request Declined";
        return back()->with('success', $response);

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
    public function destroy( $id)
    {
        $del = TenantService::find($id);
        $this->authorize('delete',$del);
        $del->delete();

        if ($del) {

            return redirect()->route('tenantservice.index')->with('success','You have successfully deleted the request');
        } else {
            return back()->with('error','An error occured');
        }

    }
}
