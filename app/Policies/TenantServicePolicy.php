<?php

namespace App\Policies;

use App\TenantService;
use App\User;

use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class TenantServicePolicy
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
     * @param  \App\TenantService  $tenantService
     * @return mixed
     */
    public function view(User $user, TenantService $tenantService)
    {
        if ( $user->isOwner() || $user->isManager() && $tenantService->property->user_id == $user->id || $user->isTenant() && $user->id == $tenantService->user_id ) {
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\TenantService  $tenantService
     * @return mixed
     */
    public function update(User $user, TenantService $tenantService)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\TenantService  $tenantService
     * @return mixed
     */
    public function delete(User $user, TenantService $tenantService)
    {
        if ( $user->isOwner() || $user->isManager() && $tenantService->property->user_id == $user->id) {
            return Response::allow();
        } else {
            return Response::deny("You do not have permission to access this route",401);
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\TenantService  $tenantService
     * @return mixed
     */
    public function restore(User $user, TenantService $tenantService)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\TenantService  $tenantService
     * @return mixed
     */
    public function forceDelete(User $user, TenantService $tenantService)
    {
        //
    }
}
