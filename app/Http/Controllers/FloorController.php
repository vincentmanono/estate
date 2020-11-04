<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Unit;
use Illuminate\Http\Request;

class FloorController extends Controller
{    public function store(Request $request)
    {
        request()->validate(array(
            'image' => 'image',
            'kitchen'=>'required',
            'sitting'=>'required',
            'swimming'=>'required',
            'garden'=>'required'
        ));

        $floor = Floor::create($request->all());
        $floor->image = $this->uploadImage($request) ;
        $floor->save();
        $request->session()->flash('success', "floor plan saved");
        return back();

    }
    public function update(Request $request, Floor $floor)
    {
        // dd($request->all()) ;
        $floor->update($request->all());
       if (file_exists($request->file('image'))) {
         $floor->update([
             'image' => $this->uploadImage($request)
         ]);
       }

       $request->session()->flash('success', "floor plan updated");
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        //
    }

    protected function uploadImage($request)
    {

        if (file_exists($request->file('image'))) {



            // $old_avatar = $user->avatar;
            // $avatar = $request->avatar;
            // if ($old_avatar != 'avatar.png' && !Str::contains(auth()->user()->avatar, 'http')) {
            //     $imagepath = public_path('/storage/users') . '/' . $old_avatar;
            //     File::delete($imagepath);
            // }



            // Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // dd($filenameWithExt) ;
            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            // Uplaod image
            $path = $request->file('image')->storeAs('public/floor', $filenameToStore);

            // Upload image
            return  $filenameToStore;
        }else{
            return null ;
        }


    }
}
