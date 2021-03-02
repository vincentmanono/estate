<?php

namespace App\Http\Controllers;

use App\Unit;
use App\User;
use App\Lease;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;

class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leases = Lease::all();


        $user = User::find(Auth::user()->id);
        $this->authorize('viewAny', Lease::class);
        if ($user->isOwner() || $user->isTenant()) {

            $leases = ($user->isOwner()) ? Lease::latest()->get() :  $user->leases()->latest()->get();
            // dd($rents);
            $compact = compact('leases');
        } else {
            $properties = $user->properties;
            $compact = compact('properties');
        }



        return view('lease.index', $compact)->with('param', "All lease Records");
    }
    public function leaseReport()
    {
        $leases = Lease::all();

        return view('reports.occupancyreport', compact('leases'))->with('params', 'Occupancy Report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Lease::class);
        $users = User::latest()->get();
        $user = User::find(Auth::user()->id);

        if ($user->isOwner()) {
            $units = Unit::latest()->where('status',0)->get();
            $compact = compact('units', 'users');
        } else {
            $properties = $user->properties;
            $compact = compact('properties', 'users');
        }

        return view('lease.createEdit', $compact)->with('params', 'Add Lease Record');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => ['required'],
            'date' => ['required'],
            'user_id' => ['required'],
            'unit_id' => ['required'],
            'file' => ['required']

        ]);

        $post = new Lease();
        $this->authorize('create', Lease::class);


        $post->status = $request->status;
        $post->date = $request->date;
        $post->user_id = $request->user_id;
        $post->unit_id = $request->unit_id ;

        //turn unit status as Occupied
        $unit = Unit::findOrFail($request->unit_id);
        $unit->status = true;
        $unit->save();

        if (file_exists($request->file('file'))) {
            $post->file = $this->fileupload($request);
        }

        $validate = $post->save();

        if ($validate) {
            return redirect()->route('deposit.create') ->with('success', 'The lease details were cuptured successfully');
        } else {
            return back()->with('error', 'An error occured. Please try again!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lease = Lease::find($id);
        $this->authorize('view', $lease);
        return view('lease.show', compact('lease'))->with('params', 'View Lease Record');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lease = Lease::find($id);
        $this->authorize('update', $lease);
        $user = User::find(Auth::user()->id);

        if ($user->isManager()) {
            $properties = $user->properties;
            $compact = compact('lease', 'properties');
        } else {
            $units = Unit::latest()->get();
            $compact = compact('lease', 'units');
        }


        return view('lease.createEdit', $compact)->with('params', 'Edit Lease Record');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'status' => ['required'],
            'date' => ['required'],
            'user_id' => ['required'],
            'unit_id' => ['required']

        ]);

        $post =  Lease::find($id);

        $this->authorize('update', $post);

        $post->status = $request->status;
        $post->date = $request->date;
        $post->user_id = $request->user_id;
        $post->unit_id = $request->unit_id;



        if (file_exists($request->file('file'))) {
            // Upload file
            $post->file = $this->fileupload($request, $post);
        }

        $validate = $post->save();

        if ($validate) {
            return back()->with('success', 'The lease details were updated successfully.');
        } else {
            return back()->with('error', 'An error occured. Please try again!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $del = Lease::find($id);
            $this->authorize('delete', $del);

            //turn unit status as Occupied
            $unit = Unit::findOrFail($del->unit->id);
            $unit->status = false;
            $unit->save();


            $old_avatar = $del->file;
            if ($old_avatar != 'avatar.pdf') {
                $imagepath = public_path('/storage/lease/')  . $old_avatar;
                File::delete($imagepath);
                // Storage::delete('Property/'. $old_avatar );
            }

            if ($del->delete()) {

                return redirect()->route('lease.index')->with('success', "Lease deleted successfully");;
            } else {

                return back()->with('error', 'An error occurred please try gain!!');;
            }
        } catch (QueryException $ex) {

            return redirect()->back()->with('error', 'Lease could not be found');
        }
    }

    protected function fileupload($request, $lease = null)
    {
        // Get filename with extension
        $filenameWithExt = $request->file('file')->getClientOriginalName();

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        if ($lease != null) {
            $old_file = $lease->file;
            if ($old_file != null) {
                $imagepath = public_path('/storage/lease') . '/' . $old_file;
                File::delete($imagepath);
            }
        }


        // Get extension
        $extension = $request->file('file')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        // Uplaod file
        $path = $request->file('file')->storeAs('public/lease', $filenameToStore);
        return $filenameToStore;
    }
}
