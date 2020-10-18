<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function allUsers()
    {
        $users = User::all();
        return view('users.index', compact('users'))->with('params', "users");
    }
    public function allTenants()
    {
        $users = User::where('type', 'tenant')->get();
        return view('users.index', compact('users'))->with('params', "Tenants");
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function createUser()
    {

        return view('users.createEdit')->with('params', 'create');
    }

    public function addUser(UserRequest $request)
    {
        $password = "chiefproperties" . date("Y");
        $type = $request->input('type');
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->kra_pin = $request->input('kra');
        $user->id_no = $request->input('ID');
        $user->type = $type;
        $user->password =  Hash::make($password);
        if ($user->save()) {
            Session::flash('success', $type . " created successfully");
            return redirect()->route("allUsers");
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('users.createEdit', compact('user'))->with('params', 'edit');


    }

    public function updateUser(UserRequest $request,$id)
    {
        if(!$request->hasFile('avatar') && $request->has('avatar')){
            return redirect()->back()->with('error','Image not supported');
        }
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->kra_pin = $request->input('kra');
        $user->id_no = $request->input('ID');
        $user->type = $request->input('type');


        if($request->password != ''){
            if($request->password == $request->confirm_password){
                $user->password = bcrypt($request->password);
            }
            else{
                Session::flash('error', 'Confirmation password and the password do not match.');
                return redirect()->back();
            }
        }



    }





    public function deleteUser($id)
    {
        //
        try {
            $user = User::where('id', $id)->first();
        } catch (QueryException $ex) {

            Session::flash('error', 'Admin/User could not be found!');
            return redirect()->back();

        }

        if (Auth::user()->type == 'owner' || Auth::user()->id == $id) {
            if (User::where('type', 'owner')->count() == 1 && Auth::user()->type == 'owner' && Auth::user()->id == $user->id) {
                Session::flash('error', 'Sorry, you are the ONLY REMAINING owner! Make someone else a super admin then exit.');
                return redirect()->back();

            }
            $user->delete();
            Session::flash('success', 'Admin/User removed successfully');

            return redirect()->route('allUsers');
        }
        Session::flash('error', 'Admin/User could not be removed! Task only allowed to Managers / Owner!');
        return redirect()->back();
    }
}
