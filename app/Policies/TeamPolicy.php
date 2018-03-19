<?php

namespace App\Policies;

use App\User;
use App\Models\TeamModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->email == 'nikolas-ja@meta.ua';
    }

    /**
     * Determine whether the user can view the teamModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TeamModel  $teamModel
     * @return mixed
     */
    public function view(User $user, TeamModel $teamModel)
    {
        //
    }

    /**
     * Determine whether the user can create teamModels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the teamModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TeamModel  $teamModel
     * @return mixed
     */
    public function update(User $user, TeamModel $teamModel)
    {
        //
    }

    /**
     * Determine whether the user can delete the teamModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TeamModel  $teamModel
     * @return mixed
     */
    public function delete(User $user, TeamModel $teamModel)
    {
        //
    }
}
