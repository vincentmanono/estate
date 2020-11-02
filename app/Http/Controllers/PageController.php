<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Property;

class PageController extends Controller
{
    public function index(){
        $properties=Property::all();

        return view('client.index',compact('properties'));
    }

    public function property(){

        $properties=Property::orderBy('id','Desc')->get();

        return view('client.properties',compact('properties'));

    }
    public function show($id){

        $property =Property::find($id);
        return view('client.singleproperty',compact('property'));

    }
    public function images($id){

        $property =Property::find($id);
        return view('client.gallery',compact('property'));

    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>['required'],
            'phone'=>['required'],
            'unit_id'=>['required'],
            'email'=>['required'],
            'identity'=>['required']
        ]);

        $post = new Application();

        $post->name=$request->name;
        $post->email=$request->email;
        $post->identity=$request->identity;
        $post->unit_id=$request->unit_id;
        $post->phone=$request->phone;

        $validate=$post->save();

        if($validate){
            return back()->with('success','Your application has been successfully sent. We shall get back to you soon');
        }
        else{
            return back()->with('error','An error occured. Please try again!');
        }
    }
}
