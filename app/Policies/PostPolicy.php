<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     * USEFUL COMMENTS
     * each function corresponds to a method in resource controller
     * User $user is auto added so it can view/create/update...
     * the standard layout can be deleted for this app
     */



    //  dont need to check other routes, only modify needs auth
     public function modify(User $user, Post $post) : bool
     {
        // check if they are the same column in post table, if the user owns this post
        return $user->id === $post->user_id;

     }

}
