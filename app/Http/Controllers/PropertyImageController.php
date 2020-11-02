<?php

namespace App\Http\Controllers;

use App\Property;
use App\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PropertyImageController extends Controller
{

    public function create($id)
    {
         $property= Property::where('id',$id)->first();

        return view('properties.addImages',compact('property')) ;

    }


    public function store(Request $request , $id)
    {
        $image = $request->file('file');
        $imageName = $this->fileupload($image) ;
        $property = Property::findOrFail($id);
        $property->images()->create(
            [
                'image'=> $imageName
            ]
            );
        return response()->json(['success'=>$imageName]);
    }


    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        PropertyImage::where('image',$filename)->delete();
        $path=public_path('/storage/property').'/'.$filename;
        if (file_exists($path)) {
            // unlink($path);
            File::delete($path);
        }



        return $path;
    }

    public function fileupload($file)
    {
        if (file_exists($file)) {

            // Get filename with extension
            $filenameWithExt = $file->getClientOriginalName();


            // Uplaod image
            $path = $file->storeAs('public/property', $filenameWithExt);

            return $filenameWithExt;
        }

    }

}
