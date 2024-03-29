<?php

namespace App\Http\Controllers;

use App\Unit;
use App\User;
use App\Lease;
use App\Branch;
use App\Property;
// use Barryvdh\DomPDF\PDF;
use Illuminate\support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use  PDF;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->authorizeResource( Property::class,'property' );
    }
    public function index()
    {
        // $user =User::where('id',Auth::user()->id)->first();
        $properties = Property::latest()->get();

        $this->authorize("viewAny", Property::class);

        return view('properties.index', compact('properties'))->with('param','all properties');
    }
    public function pdfconv(Request $request){
        $properties = Property::all();
        $this->authorize("viewAny", Property::class);
        $pdf = PDF::loadView('propdfconv',compact('properties'));
        $pdf->save(storage_path().'_properties.pdf');
               return $pdf->download('properties.pdf');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create", Property::class);
        $branches = Branch::all();
        $users = User::where('type', 'manager')->get();
        return view('properties.createEdit', compact('branches', 'users'))->with('param', 'Add Property');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize("create", Property::class);
        $this->validate($request, [


            'name' => ['string'],
            'type' => ['required'],
            'date_of_cert_of_occupation' => [''],
            'address' => ['string'],
            'image' => ['required'],
            'year_of_construction' => [''],
            'water_bill_rate' => ['string'],
            'l_r_no' => ['string'],
            'branch_id' => [''],
            'user_id' => [''],

        ]);
        $post = new Property();

        $post->name = $request->name;
        $post->type = $request->type;
        $post->date_of_cert_of_occupation = $request->date_of_cert_of_occupation;
        $post->address = $request->address;
        $post->year_of_construction = $request->year_of_construction;
        $post->water_bill_rate = $request->water_bill_rate;
        $post->l_r_no = $request->l_r_no;
        $post->branch_id = $request->branch_id;
        $post->user_id = $request->user_id;

        if (file_exists($request->file('image'))) {


            $post->image = $this->imageUpload($request);
        }
        $validate = $post->save();

        if ($validate) {
            return redirect()->route('property.index')->with('success', 'You have successfully added a new Property');
        } else {
            return redirect()->back()->with('error', 'An error occured while submitting the Property details');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $this->authorize("view", $property);
        $units = Unit::all();
        $leases = Lease::all();

        return view('properties.show', compact('property', 'units', 'leases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $this->authorize("update", $property);
        $branches = Branch::all();
        $users = User::where('type', 'manager')->get();
        return view('properties.createEdit', compact('branches', 'users', 'property'))->with('param', 'Edit Property');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Property $property)
    {
        $this->authorize("update", $property);

        $this->validate($request, [


            'name' => ['string'],
            'type' => ['required'],
            'date_of_cert_of_occupation' => [''],
            'address' => ['string'],
            'image' => ['nullable'],
            'year_of_construction' => [''],
            'water_bill_rate' => ['string'],
            'l_r_no' => ['string'],
            'branch_id' => [''],
            'user_id' => [''],

        ]);
        $post = Property::find($property->id);

        $post->name = $request->name;
        $post->type = $request->type;
        $post->date_of_cert_of_occupation = $request->date_of_cert_of_occupation;
        $post->address = $request->address;
        $post->year_of_construction = $request->year_of_construction;
        $post->water_bill_rate = $request->water_bill_rate;
        $post->l_r_no = $request->l_r_no;
        $post->branch_id = $request->branch_id;
        $post->user_id = $request->user_id;

        if (file_exists($request->file('image'))) {
            $post->image = $this->imageUpload($request,$post);
        }
        $validate = $post->save();

        if ($validate) {
            return redirect()->route('property.show',$post->id)->with('success', 'You have successfully Edited the Property');
        } else {
            return redirect()->back()->with('error', 'An error occured while updating the Property details!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        try {
            $this->authorize("delete", $property);
            $del = Property::find($property->id);

            $old_avatar = $del->image;
            if ($old_avatar != 'avatar.png') {
                $imagepath = public_path('/storage/property/')  . $old_avatar;
                File::delete($imagepath);
                // Storage::delete('Property/'. $old_avatar );
            }

            if ($del->delete()) {

                return redirect()->route('property.index')->with('success', "Property deleted successfully");;
            } else {

                return back()->with('error', 'An error occurred please try gain!!');;
            }
        } catch (QueryException $ex) {

            return redirect()->back()->with('error', 'Property could not be found');
        }
    }

    public function imageUpload($request, $property = null)
    {
        if (!empty($property)) {
            $old_avatar = $property->image;
            $avatar = $request->image;
            if ($old_avatar != 'property.png' && !Str::contains($old_avatar , 'http')) {
                $imagepath = public_path('/storage/property') . '/' . $old_avatar;
                File::delete($imagepath);
            }
        }

        // Get filename with extension
        $filenameWithExt = $request->file('image')->getClientOriginalName();

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file('image')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        // Uplaod image
        $path = $request->file('image')->storeAs('public/property', $filenameToStore);

        // Upload image
        return $filenameToStore;
    }
}
