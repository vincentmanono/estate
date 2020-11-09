<?php

namespace App\Http\Controllers;

use App\Application;
use App\Jobs\EmailApplicant;
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


        if ( auth()->user()->type == "owner" ) {
            $applications = Application::latest()->get();
            return view('apprequest.index', compact('applications'))->with('param','owner');
        } else {
            $manager = auth()->user();

            $properties = Property::where('user_id',$manager->id)->with('applications')->get();
            return view('apprequest.index', compact('properties'))->with('param','manager');

        }





    }
    public function approveDecline(Request $request,  $id)
    {
        $this->validate($request, [
            'status' => ['required']
        ]);
        $application = Application::findOrFail($id);
        $status = $request->status ;
        $application->update([
            'status' => $status
        ]);
        $response = ($status) ? "Application Approved" : "Application Desclined";
        dispatch( new EmailApplicant($status , $application) ) ;
        return back()->with('success', $response);
    }





    public function show(Application $application)
    {
        //
    }


    public function destroy(Application $application)
    {
        //
    }
}
