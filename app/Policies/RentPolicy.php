<?php

namespace App\Policies;

use App\Rent;
use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class RentPolicy
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
     * @param  \App\Rent  $rent
     * @return mixed
     */
    public function view(User $user, Rent $rent)
    {
        if ( $user->isOwner() || $user->isManager() && $rent->unit->property->user_id == $user->id || $user->id == $rent->user_id ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",HttpFoundationResponse::HTTP_UNAUTHORIZED);
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
            return Response::deny("You do not have permission to access this route",HttpFoundationResponse::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Rent  $rent
     * @return mixed
     */
    public function update(User $user, Rent $rent)
    {
        if ( $user->isOwner() || $user->isManager() && $rent->unit->property->user_id == $user->id  ) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",HttpFoundationResponse::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Rent  $rent
     * @return mixed
     */
    public function delete(User $user, Rent $rent)
    {

        if ( $user->isOwner() ) {
            return Response::allow();
         } else {
            return Response::deny("You do not have permission to access this route",HttpFoundationResponse::HTTP_UNAUTHORIZED);
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Rent  $rent
     * @return mixed
     */
    public function restore(User $user, Rent $rent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Rent  $rent
     * @return mixed
     */
    public function forceDelete(User $user, Rent $rent)
    {
        //
    }
}
