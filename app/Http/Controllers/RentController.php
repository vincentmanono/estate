<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::findOrFail(Auth::user()->id);

        $this->authorize('viewAny',Rent::class);
        if ($user->isOwner() || $user->isTenant()) {

            $rents = ($user->isOwner()) ? Rent::latest()->get() :  $user->rents ;
            $compact = compact('rents');
        } else {
            $properties = $user->properties;
            $compact = compact('properties');
        }

        return view('rents.index', $compact)->with('param', 'Rent Records');
    }
    public function rentReport()
    {

        $rents = Rent::latest()->get();
        return view('reports.rentreport', compact('rents'))->with('params', 'Rents');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Rent::class);


        $user = User::find(Auth::user()->id);
        $tenants = User::latest()->get();
        if ( $user->isOwner() ) {
            $units = Unit::latest()->get();
             return view('rents.createEdit', compact('units', 'tenants'))->with('param', 'Add Rent Records');
        } else {
            $properties = $user->properties;
            return view('rents.createEdit', compact('properties','tenants'))->with('param', 'Add Rent Records');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=  $this->validate($request, [

            'amount' => 'required',
            'paid_date' => 'required',
            'unit_id' => 'required',
            'user_id' => 'required',
            'description' => 'required',
            'expiry_date' => 'required',
        ]);
        $this->authorize('create',Rent::class);

        $unit = Unit::findOrFail($request->unit_id);
        $post = new Rent();

        $post->amount = $request->amount;
        $post->paid_date = $request->paid_date;
        $post->unit_id = $request->unit_id;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->expiry_date = $request->expiry_date;
        $post->property_id = $unit->property->id ;

        $validate = $post->save();

        if ($validate) {

            return redirect()->route('rent.index') ->with('success', 'You have successfully added the rent record.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rents = Rent::all();
        $rent = Rent::find($id);
        $this->authorize('view',$rent);

        return view('rents.show', compact('rent', 'rents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rent = Rent::find($id);
        $this->authorize('update',$rent);
        return view('rents.createEdit', compact('rent'))->with('param', 'Edit Rent Details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'amount' => 'required',
            'paid_date' => 'required',
            'unit_id' => 'required',
            'user_id' => 'required',
            'description' => 'required',
            'expiry_date' => 'required',
        ]);

        $post = Rent::find($id);
        $unit = Unit::findOrFail($request->unit_id);
        $this->authorize('update',$post);


        $post->amount = $request->amount;
        $post->paid_date = $request->paid_date;
        $post->unit_id = $request->unit_id;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->expiry_date = $request->expiry_date;
        $post->property_id = $unit->property->id ;


        $validate = $post->save();

        if ($validate) {

            return back()->with('success', 'You have successfully updated the rent record.');
        } else {
            return back()->with('error', 'An error occured. Please try again!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $del = Rent::find($id);
        $this->authorize('update',$del);

        $del->delete();

        if ($del) {
            return redirect()->route('rent.index')->with('success', 'You have successfully deleted the record');
        } else {
            return back()->with('error', 'An error occured. Please try again!!!');
        }
    }
}
