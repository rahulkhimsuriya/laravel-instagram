<?php

  namespace App\Policies;

  use App\Comment;
  use App\User;
  use Illuminate\Auth\Access\HandlesAuthorization;

  class CommentPolicy {

    use HandlesAuthorization;

    public function delete(User $currentUser, Comment $comment)
    {
      return $currentUser->is($comment->user);
    }

  }
