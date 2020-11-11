<?php

namespace App\Policies;

use App\User;
use App\Deposit;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepositPolicy
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
     * @param  \App\Deposit  $deposit
     * @return mixed
     */
    public function view(User $user, Deposit $deposit)
    {
        if ( $user->isOwner() || $user->isManager() && $deposit->unit->property->user_id == $user->id || $user->id == $deposit->user_id ) {
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
     * @param  \App\Deposit  $deposit
     * @return mixed
     */
    public function update(User $user, Deposit $deposit)
    {
        if ( $user->isOwner() || $user->isManager() && $deposit->unit->property->user_id == $user->id  ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",401);
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Deposit  $deposit
     * @return mixed
     */
    public function delete(User $user, Deposit $deposit)
    {
        if ( $user->isOwner() ) {
            return Response::allow();
         } else {
             return Response::deny("You dont have that power to delete deposit",401);
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Deposit  $deposit
     * @return mixed
     */
    public function restore(User $user, Deposit $deposit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Deposit  $deposit
     * @return mixed
     */
    public function forceDelete(User $user, Deposit $deposit)
    {
        //
    }
}
