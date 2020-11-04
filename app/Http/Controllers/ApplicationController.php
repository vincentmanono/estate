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
        $response = ($status) ? "Application Approved" : "Application Desclined";
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
