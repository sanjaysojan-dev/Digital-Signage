<?php

namespace App\Policies;

use App\Models\DisplayNode;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DisplayNodePolicy
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
     * @param  \App\Models\DisplayNode  $displayNode
     * @return mixed
     */
    public function view(User $user, DisplayNode $displayNode)
    {
        if ($user->id === $displayNode->user_id){
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
     * @param  \App\Models\DisplayNode  $displayNode
     * @return mixed
     */
    public function update(User $user, DisplayNode $displayNode)
    {
        if ($user->id === $displayNode->user_id){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisplayNode  $displayNode
     * @return mixed
     */
    public function delete(User $user, DisplayNode $displayNode)
    {
        if ($user->id === $displayNode->user_id){
            return true;
        }
    }

}
