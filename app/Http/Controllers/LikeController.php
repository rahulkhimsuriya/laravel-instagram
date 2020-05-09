<?php

  namespace App\Http\Controllers;

  use App\Post;
  use Illuminate\Http\Request;

  class LikeController extends Controller {

    public function toggleLike(Post $post)
    {
      $user = auth()->user();

      $post->isLikedByUser($user) ? $post->unlike($user) : $post->like($user);

      return back();
    }

  }
