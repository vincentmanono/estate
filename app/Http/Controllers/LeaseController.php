<?php

namespace App\Http\Controllers;

use App\Lease;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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

        return view('lease.index',compact('leases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $units = Unit::all();
        return view('lease.createEdit',compact('users','units'))->with('params','Add Lease Record');
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
            'status'=>['required'],
            'date'=>['required'],
            'user_id'=>['required'],
            'unit_id'=>['required'],
            'file'=>['required']

        ]);

        $post = new Lease();

        $post->status=$request->status;
        $post->date=$request->date;
        $post->user_id=$request->user_id;
        $post->unit_id=$request->unit_id;

        if (file_exists($request->file('file'))) {

            // Get filename with extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();

            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('file')->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $extension . '_' . time() . '.' . $filename;

            // Uplaod file
            $path = $request->file('file')->storeAs('public/lease', $filenameToStore);
           $post->file =$filenameToStore;

        }

        $validate=$post->save();

        if($validate){
            return back()->with('success','The lease details were cuptured successfully');
        }
        else{
            return back()->with('error','An error occured. Please try again!!!');
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
        return view('lease.show',compact('lease'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $users = User::all();
        $units = Unit::all();
        $lease = Lease::find($id);
        return view('lease.createEdit',compact('users','units','lease'))->with('params','Edit Lease Record');
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
        $this->validate($request,[
            'status'=>['required'],
            'date'=>['required'],
            'user_id'=>['required'],
            'unit_id'=>['required'],
            'file'=>['required']

        ]);

        $post =  Lease::find($id);

        $post->status=$request->status;
        $post->date=$request->date;
        $post->user_id=$request->user_id;
        $post->unit_id=$request->unit_id;



        if (file_exists($request->file('file'))) {



            $old_avatar = $post->file;
            $avatar = $request->file;
            if ($old_avatar != 'avatar.pdf' && !Str::contains($avatar, 'http')) {
                $filepath = public_path('/storage/lease') . '/' . $old_avatar;
                File::delete($filepath);
            }



            // Get filename with extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();

            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('file')->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $extension . '_' . time() . '.' . $filename;

            // Uplaod file
            $path = $request->file('file')->storeAs('public/lease', $filenameToStore);

            // Upload file
            $post->file = $filenameToStore;
        }

        $validate=$post->save();

        if($validate){
            return back()->with('success','The lease details were updated successfully.');
        }
        else{
            return back()->with('error','An error occured. Please try again!!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            $del = Lease::find($id);

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

            return redirect()->back()->with('error','Lease could not be found');
        }
    }
}
