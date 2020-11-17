<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Notifications\UserCreatedNotification;
use App\Unit;
use App\Lease;
use App\Property;
use App\Water;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function allUsers()
    {
        $users = User::all();
        return view('users.index', compact('users'))->with('params', "users");
    }
    public function allTenants()
    {
        if (Auth::user()->isOwner() ) {
            $leases= Lease::latest()->get();
            return view('users.tenants/index', compact('leases'))->with('params', "Tenants");

        } elseif (Auth::user()->isManager() ) {
            $properties = Property::where('user_id',Auth::user()->id)->get();
            return view('users.tenants/index', compact('properties'))->with('params', "Tenants");
        }else{
            $leases = Auth::user()->leases ;
            return view('users.tenants/index', compact('leases'))->with('params', "Tenants");
        }



    }
    public function tenantReport(){
        $leases = Lease::all();
        $tenants = User::where('type', 'tenant')->get();
        return view('reports.tenantreport', compact('tenants','leases'))->with('params', "Tenants");

    }

    public function tenantUnit($tenantId , $unitId)
    {
        $tenant = User::findOrFail($tenantId) ;
        $unit = Unit::findOrFail($unitId) ;
        $unPaidWaterBilling = Water::where('unit_id',$unit->id)->where('paid',false) ->pluck('amount')->sum();
        return view('users.userUnit',compact('unit','unPaidWaterBilling')) ;

    }

    public function showUser($id)
    {


        if ( Auth::user()->isOwner() || Auth::user()->isManager() ) {
          $user = User::findOrFail($id);

        } elseif( Auth::user()->id == $id ) {
            $user = User::findOrFail($id);
        }else{
            Session::flash('error',"You do not have previlagies to view other tenant profile");
            return back();
        }



        return view('users.show', compact('user'));
    }

    public function showUserProfile($slug)
    {
        try {
            $user = User::where('slug',$slug)->first();
            // dd($user->image);
            if ( Auth::user()->isTenant() && Auth::user()->slug != $slug ) {
                  Session::flash('error',"You do not have previlagies to view other tenant profile");
                  return back();
              }

        } catch (\Throwable $th) {
            Session::flash('error',"You do not have previlagies to view other tenant profile");
            return back();
        }
        return view('users.profile',compact('user'));
    }

    public function createUser()
    {
        if ( Auth::user()->isOwner() || Auth::user()->isManager() ) {
            return view('users.createEdit')->with('params', 'create');
        } else {
            Session::flash('error',"You do not have previlagies to create other tenant profile");
            return back();
        }
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
        $user->password = Hash::make($password);

        if (file_exists($request->file('image'))) {
            $user->image = $this->uploadUserAvatar($request,$user) ;
        }

        if ($user->save()) {
            Session::flash('success', $type . " created successfully");
            Notification::send( $user, new UserCreatedNotification($user , $password) ) ;
            return redirect()->route("allUsers");
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        if ( $user->isOwner() &&  Auth::user()->isOwner() ) {
            return view('users.createEdit', compact('user'))->with('params', 'edit');
        } elseif($user->isOwner() && ! Auth::user()->isOwner()) {
            Session::flash('error',"You do not have previlagies to update owner profile");
            return back();
        }else{
            return view('users.createEdit', compact('user'))->with('params', 'edit');
        }





    }

    public function updateUser(UserRequest $request,$id)
    {
        $user = User::findOrFail($id);
        if ( $user->isOwner() && ! Auth::user()->isOwner() ) {
            Session::flash('error',"You do not have previlagies to update owner profile");
            return back();
        }
        if ( $user->isManager() && ! Auth::user()->id !== $id  ) {
            Session::flash('error',"You do not have previlagies to update this profile");
            return back();
        }


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

        if (file_exists($request->file('image'))) {
            $user->image = $this->uploadUserAvatar($request,$user) ;
        }


        if($request->password != ''){
            if($request->password == $request->confirm_password){
                $user->password = bcrypt($request->password);
            }
            else{
                Session::flash('error', 'Confirmation password and the password do not match.');
                return redirect()->back();
            }
        }

        if ( $user->save()) {
            Session::flash('success', 'User Profile updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Please try again');
            return redirect()->back();
        }




    }

    public function deleteUser($id)
    {
        //
        try {
            $user = User::where('id', $id)->first();

            $user = User::findOrFail($id);
        if ( $user->isOwner() && ! Auth::user()->isOwner() ) {
            Session::flash('error',"You do not have previlagies to delete owner profile");
            return back();
        }
        if ( $user->isManager() && ! Auth::user()->id !== $id  ) {
            Session::flash('error',"You do not have previlagies to delete this profile");
            return back();
        }



        } catch (QueryException $ex) {

            Session::flash('error', 'Admin/User could not be found!');
            return redirect()->back();

        }

        if (Auth::user()->type == 'owner' || Auth::user()->type == 'manager' || Auth::user()->id == $id) {
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

    protected function uploadUserAvatar($request,$user)
    {


            $old_avatar = $user->image;
            $avatar = $request->image;
            if ($old_avatar != 'avatar.png' && !Str::contains(auth()->user()->image, 'http')) {
                $imagepath = public_path('/storage/users') . '/' . $old_avatar;
                File::delete($imagepath);
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
            $path = $request->file('image')->storeAs('public/users', $filenameToStore);

            // Upload image
            return $filenameToStore;


    }

}
