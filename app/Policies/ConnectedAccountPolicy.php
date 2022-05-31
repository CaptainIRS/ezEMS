<?php

namespace App\Policies;

use App\Models\ConnectedAccount;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConnectedAccountPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param ConnectedAccount $connectedAccount
     * @return mixed
     */
    public function view(User $user, ConnectedAccount $connectedAccount)
    {
        return $user->ownsConnectedAccount($connectedAccount);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param ConnectedAccount $connectedAccount
     * @return mixed
     */
    public function update(User $user, ConnectedAccount $connectedAccount)
    {
        return $user->ownsConnectedAccount($connectedAccount);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ConnectedAccount $connectedAccount
     * @return mixed
     */
    public function delete(User $user, ConnectedAccount $connectedAccount)
    {
        return $user->ownsConnectedAccount($connectedAccount);
    }
}
