<?php

namespace App\Policies;

use App\Models\DisplayContent;
use App\Models\DisplayNode;
use App\Models\NodeContent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NodeContentPolicy
{
    use HandlesAuthorization;

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
     * @param User $user
     * @param DisplayNode $displayNode
     * @param DisplayContent $displayContent
     * @return bool
     */
    public function delete(User $user, DisplayContent $displayContent, DisplayNode $displayNode)
    {

        if (($user->id === $displayContent->user_id)||($user->id === $displayNode->user_id)){
            return true;
        }
    }

}
