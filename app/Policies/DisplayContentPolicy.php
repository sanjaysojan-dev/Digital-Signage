<?php

namespace App\Policies;

use App\Models\DisplayContent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DisplayContentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisplayContent  $displayContent
     * @return mixed
     */
    public function view(User $user, DisplayContent $displayContent)
    {
        if ($user->id === $displayContent->user_id){
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisplayContent  $displayContent
     * @return mixed
     */
    public function update(User $user, DisplayContent $displayContent)
    {
        if ($user->id === $displayContent->user_id){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisplayContent  $displayContent
     * @return mixed
     */
    public function delete(User $user, DisplayContent $displayContent)
    {
        if ($user->id === $displayContent->user_id){
            return true;
        }
    }

}
