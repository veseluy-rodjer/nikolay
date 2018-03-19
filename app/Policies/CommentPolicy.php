<?php

namespace App\Policies;

use App\User;
use App\Models\CommentModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->email == 'nikolas-ja@meta.ua';
    }

    /**
     * Determine whether the user can view the commentModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CommentModel  $commentModel
     * @return mixed
     */
    public function view(User $user, CommentModel $commentModel)
    {
        //
    }

    /**
     * Determine whether the user can create commentModels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the commentModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CommentModel  $commentModel
     * @return mixed
     */
    public function update(User $user, CommentModel $commentModel)
    {
        //
    }

    /**
     * Determine whether the user can delete the commentModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CommentModel  $commentModel
     * @return mixed
     */
    public function delete(User $user, CommentModel $commentModel)
    {
        //
    }
}
