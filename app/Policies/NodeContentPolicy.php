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

}
