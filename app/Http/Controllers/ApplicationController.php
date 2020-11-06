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
        } else {
            $manager = auth()->user();

            $properties = Property::where('user_id',$manager->id)->with('applications')->get();

        }




        return view('apprequest.index', compact('properties'));
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
<<<<<<< HEAD
        $response = ($status) ? "Application Approved" : "Application Declined";
=======
        $response = ($status) ? "Application Approved" : "Application Desclined";
        dispatch( new EmailApplicant($status , $application) ) ;
>>>>>>> 1f782f7fe9700553fab4b8cbaab010a72e2f2111
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
