<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Property;

class PageController extends Controller
{
    public function index(){
        $properties=Property::all();

        return view('client.index',compact('properties'))->with('param','ChiefProperties Real Estate');
    }

    public function property(){

        $properties=Property::orderBy('id','Desc')->get();

        return view('client.properties',compact('properties'))->with('param','Properties');

    }
    public function show($id){

        $property =Property::find($id);
        return view('client.singleproperty',compact('property'))->with('param','Single Property');

    }
    public function images($id){

        $property =Property::find($id);
        return view('client.gallery',compact('property'))->with('param','Property Images');

    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>['required'],
            'phone'=>['required'],
            'property_id'=>['required'],
            'email'=>['required'],
            'identity'=>['required'],//ID
            'status'=>['required']
        ]);

        $post = new Application();

        $post->name=$request->name;
        $post->email=$request->email;
        $post->identity=$request->identity;
        $post->property_id=$request->property_id;
        $post->phone=$request->phone;
        $post->status= $request->status;

        $validate=$post->save();

        if($validate){
            return back()->with('success','Your application has been successfully sent. We shall get back to you soon');
        }
        else{
            return back()->with('error','An error occured. Please try again!');
        }
    }
}
