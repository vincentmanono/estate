<?php

namespace App\Policies;

use App\User;
use App\Property;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Property  $property
     * @return mixed
     */
    public function view(User $user, Property $property)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isManager() || $user->isOwner()) {
            return Response::allow();
        }
        return Response::deny("You do not have permission to create new property ",401) ;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Property  $property
     * @return mixed
     */
    public function update(User $user, Property $property)
    {
        if ($user->isManager() || $user->isOwner()) {

            if (($user->isManager() && $user->id == $property->user_id) || $user->isOwner()) {
                return Response::allow();
            } else {
                return Response::deny("You do not have permission to update property ",401) ;

            }
        }
        return Response::deny("You do not have permission to update property ",401) ;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Property  $property
     * @return mixed
     */
    public function delete(User $user, Property $property)
    {
        if ($user->isManager() || $user->isOwner()) {

            if (($user->isManager() && $user->id == $property->user_id) || $user->isOwner()) {
                return Response::allow();
            } else {
                return Response::deny("You do not have permission to delete property ",401) ;

            }
        }
        return Response::deny("You do not have permission to delete property ",401) ;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Property  $property
     * @return mixed
     */
    public function restore(User $user, Property $property)
    {
        if ($user->isManager() || $user->isOwner()) {

            if (($user->isManager() && $user->id == $property->user_id) || $user->isOwner()) {
                return Response::allow();
            } else {
                Session::flash("error", "You do not have permission to access this");
                return redirect()->back();
            }
        }
        Session::flash("error", "You do not have permission to access this");
        return redirect()->back();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Property  $property
     * @return mixed
     */
    public function forceDelete(User $user, Property $property)
    {
        if ($user->isManager() || $user->isOwner()) {

            if (($user->isManager() && $user->id == $property->user_id) || $user->isOwner()) {
                return Response::allow();
            } else {
                Session::flash("error", "You do not have permission to access this");
                return redirect()->back();
            }
        }
        Session::flash("error", "You do not have permission to access this");
        return redirect()->back();
    }
}
