<?php

namespace App\Policies;

use App\User;
use App\Lease;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeasePolicy
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
     * @param  \App\Lease  $lease
     * @return mixed
     */
    public function view(User $user, Lease $lease)
    {
        if ( $user->isOwner() || $user->isManager() && $lease->unit->property->user_id == $user->id || $user->isTenant() && $user->id == $lease->user_id ) {
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
     * @param  \App\Lease  $lease
     * @return mixed
     */
    public function update(User $user, Lease $lease)
    {
        if ( $user->isOwner() || $user->isManager() && $lease->unit->property->user_id == $user->id  ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",401);
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lease  $lease
     * @return mixed
     */
    public function delete(User $user, Lease $lease)
    {
        if ( $user->isOwner() || $user->isManager() && $lease->unit->property->user_id == $user->id  ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",401);
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lease  $lease
     * @return mixed
     */
    public function restore(User $user, Lease $lease)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lease  $lease
     * @return mixed
     */
    public function forceDelete(User $user, Lease $lease)
    {
        //
    }
}
