<?php

namespace App\Policies;

use App\User;
use App\Models\BlogModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->email == 'nikolas-ja@meta.ua';
    }

    /**
     * Determine whether the user can view the blogModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BlogModel  $blogModel
     * @return mixed
     */
    public function view(User $user, BlogModel $blogModel)
    {
        //
    }

    /**
     * Determine whether the user can create blogModels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the blogModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BlogModel  $blogModel
     * @return mixed
     */
    public function update(User $user, BlogModel $blogModel)
    {
        //
    }

    /**
     * Determine whether the user can delete the blogModel.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BlogModel  $blogModel
     * @return mixed
     */
    public function delete(User $user, BlogModel $blogModel)
    {
        //
    }
}
