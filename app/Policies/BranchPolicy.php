<?php

namespace App\Policies;

use App\User;
use App\Branch;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true ;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function view(User $user, Branch $branch)
    {
        return true ;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ( $user->isManager() || $user->isOwner() ) {
            return Response::allow() ;
         }
         Session::flash("error","You do not have permission to access this") ;
          return redirect()->back() ;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function update(User $user, Branch $branch)
    {

        if ( $user->isManager() || $user->isOwner() ) {
            return Response::allow() ;
         }
         Session::flash("error","You do not have permission to access this") ;
          return redirect()->back() ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function delete(User $user, Branch $branch)
    {
        if ( $user->isManager() || $user->isOwner() ) {
            return Response::allow() ;
         }
         Session::flash("error","You do not have permission to access this") ;
         return redirect()->back() ;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function restore(User $user, Branch $branch)
    {
        if ( $user->isManager() || $user->isOwner() ) {
            return Response::allow() ;
         }
         Session::flash("error","You do not have permission to access this") ;
         return redirect()->back() ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Branch  $branch
     * @return mixed
     */
    public function forceDelete(User $user, Branch $branch)
    {
        if ( $user->isManager() || $user->isOwner() ) {
            return Response::allow() ;
         }
         Session::flash("error","You do not have permission to access this") ;
         return redirect()->back() ;
    }
}
