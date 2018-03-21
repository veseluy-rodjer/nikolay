<?php

namespace App\Policies;

use App\User;
use App\Models\MainModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class MainPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->email == 'nikolas-ja@meta.ua';
    }

    /**
     * Determine whether the user can view the mainModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MainModel  $mainModel
     * @return mixed
     */
    public function view(User $user, MainModel $mainModel)
    {
        //
    }

    /**
     * Determine whether the user can create mainModels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the mainModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MainModel  $mainModel
     * @return mixed
     */
    public function update(User $user, MainModel $mainModel)
    {
        //
    }

    /**
     * Determine whether the user can delete the mainModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MainModel  $mainModel
     * @return mixed
     */
    public function delete(User $user, MainModel $mainModel)
    {
        //
    }
}
