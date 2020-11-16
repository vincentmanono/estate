<?php

namespace App\Policies;

use App\Unit;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class UnitPolicy
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
        if ($user->isOwner() || $user->isManager()) {
            return true;
        } else {
            return Response::deny("You do not have permission to view all Units ",401) ;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function view(User $user, Unit $unit)
    {
        if ($user->isOwner() || $user->isManager()) {
            if ($user->isManager() && $unit->property->user_id == $user->id || $user->isOwner()) {
                return Response::allow();
            } else {
                return Response::deny("You do not have permission to view unit ",HttpFoundationResponse::HTTP_UNAUTHORIZED) ;

            }
        } else {
            return Response::deny("You do not have permission to view unit ",HttpFoundationResponse::HTTP_UNAUTHORIZED) ;

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
        if ($user->isOwner() || $user->isManager()) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to create unit ",HttpFoundationResponse::HTTP_UNAUTHORIZED) ;

        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function update(User $user, Unit $unit)
    {
        if ($user->isOwner() || $user->isManager()) {
            if ($user->isManager() && $unit->property->user_id == $user->id || $user->isOwner()) {
                return Response::allow();
            } else {
                return Response::deny("You do not have permission to update unit ",HttpFoundationResponse::HTTP_UNAUTHORIZED) ;
            }
        } else {
            return Response::deny("You do not have permission to update unit ",HttpFoundationResponse::HTTP_UNAUTHORIZED) ;

        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function delete(User $user, Unit $unit)
    {
        if ($user->isOwner() || $user->isManager()) {
            if ($user->isManager() && $unit->property->user_id == $user->id || $user->isOwner()) {
                return Response::allow();
            } else {
                return Response::deny("You do not have permission to delete unit ",HttpFoundationResponse::HTTP_UNAUTHORIZED) ;
            }
        } else {
            return Response::deny("You do not have permission to delete unit ",HttpFoundationResponse::HTTP_UNAUTHORIZED) ;

        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function restore(User $user, Unit $unit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Unit  $unit
     * @return mixed
     */
    public function forceDelete(User $user, Unit $unit)
    {
        //
    }
}
