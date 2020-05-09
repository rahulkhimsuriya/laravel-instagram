<?php

  namespace App\Policies;

  use App\Post;
  use App\User;
  use Illuminate\Auth\Access\HandlesAuthorization;

  class PostPolicy {

    use HandlesAuthorization;

    public function edit(User $currentUser, Post $post)
    {
      return $currentUser->is($post->user);
    }

  }
