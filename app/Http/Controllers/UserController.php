<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allUsers()
    {
        $users = User::all();
        return view('users.index',compact('users'))->with('params',"users") ;

    }
    public function allTenants()
    {
        $users = User::where('type','tenant')->get();
        return view('users.index',compact('users'))->with('params',"Tenants") ;

    }
}
