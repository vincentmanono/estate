<?php

namespace App\Policies;

use App\User;
use App\Water;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class WaterPolicy
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
        return Response::allow();

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Water  $water
     * @return mixed
     */
    public function view(User $user, Water $water)
    {
        if ( $user->isOwner() || $user->isManager() && $water->unit->property->user_id == $user->id ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",401);
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ( $user->isOwner() || $user->isManager() ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",401);
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Water  $water
     * @return mixed
     */
    public function update(User $user, Water $water)
    {
        if ( $user->isOwner() || $user->isManager() && $water->unit->property->user_id == $user->id  ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",401);
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Water  $water
     * @return mixed
     */
    public function delete(User $user, Water $water)
    {
        if ( $user->isOwner() || $user->isManager() && $water->unit->property->user_id == $user->id  ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",401);
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Water  $water
     * @return mixed
     */
    public function restore(User $user, Water $water)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Water  $water
     * @return mixed
     */
    public function forceDelete(User $user, Water $water)
    {
        //
    }
}
