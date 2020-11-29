<?php

namespace App\Http\Controllers;

use App\Lease;
use App\Unit;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PDF;

class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('lease/pdf/chiefinvestmentlease') ;
        $leases = Lease::all();

        $user = User::find(Auth::user()->id);
        $this->authorize('viewAny', Lease::class);
        if ($user->isOwner() || $user->isTenant()) {

            $leases = ($user->isOwner()) ? Lease::latest()->get() : $user->leases;
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
            $units = Unit::latest()->where('status', 0)->get();
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
            'file' => ['required'],

        ]);

        $post = new Lease();
        $this->authorize('create', Lease::class);

        $post->status = $request->status;
        $post->date = $request->date;
        $post->user_id = $request->user_id;
        $post->unit_id = $request->unit_id;

        //turn unit status as Occupied
        $unit = Unit::findOrFail($request->unit_id);
        $unit->status = true;
        $unit->save();

        if (file_exists($request->file('file'))) {
            $post->file = $this->fileupload($request);
        }

        $validate = $post->save();

        if ($validate) {
            return redirect()->route('deposit.create')->with('success', 'The lease details were cuptured successfully');
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
        if ($lease->file == null || Str::of($lease->file)->contains("http")) {
            session()->flash('error', "Please Sign your lease form");
        }

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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => ['required'],
            'date' => ['required'],
            'user_id' => ['required'],
            'unit_id' => ['required'],

        ]);

        $post = Lease::find($id);

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
                $imagepath = public_path('/storage/lease/') . $old_avatar;
                File::delete($imagepath);
                // Storage::delete('Property/'. $old_avatar );
            }

            if ($del->delete()) {

                return redirect()->route('lease.index')->with('success', "Lease deleted successfully");
            } else {

                return back()->with('error', 'An error occurred please try gain!!');
            }
        } catch (QueryException $ex) {

            return redirect()->back()->with('error', 'Lease could not be found');
        }
    }

    public function leaseform()
    {
        return view('lease');
    }
    public function chiefinvlease()
    {
        return view('chiefinvestmentlease');
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
    public function showpadsign($leaseId)
    {
        $lease = Lease::find($leaseId);

        return view('lease/signfile', compact('lease'));
    }

    public function signlease(Request $request, $leaseId)
    {
        if (!is_dir(public_path('signature'))) {

            mkdir(public_path('signature'));

        }
        $folderPath = "signature/";
        $signed = $request->signed;

        $lease = Lease::find($leaseId);

        $user = User::find($request->user);
        $image_parts = explode(";base64,", $signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . uniqid() . '.' . $image_type;
        $name = Str::random(45);
        file_put_contents($file, $image_base64);

        if ($user->isTenant()) {
            $lease->update([
                'tenantSignature' => $signed,
            ]);

        } else {
            $lease->update([
                'managerSignature' => $signed,
            ]);
        }

        $this->createLeaseform($lease, $signed);
        return redirect()->route('lease.show', $leaseId)->with('success', "Signature Uploaded Successfully.");
    }

    public function createLeaseform($lease, $signed)
    {

        if ($lease->tenantSignature != null && $lease->managerSignature != null) {
            $pdf = PDF::loadView('lease.pdf.chiefinvestmentlease', compact('lease'));

            $output = $pdf->output();
            $name = Str::random(20);

            $folder = 'public/lease';

            $filePath = $folder . '/' . $name . '.' . 'pdf';
            $filename = $name . '.' . 'pdf';
            // Storage::put(filePath, $contents);
            Storage::put($filePath, $output);
            $lease->update([
                'file' => $filename,
            ]);
        }

    }

}
