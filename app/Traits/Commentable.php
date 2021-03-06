<?php

  namespace App\Traits;

  use App\Comment;

  trait Commentable {

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

  }