<?php

  namespace App\Http\Controllers;

  use App\User;
  use Illuminate\Http\Request;

  class FollowController extends Controller {

    public function store(User $user)
    {
      if (auth()->user()->following($user)) {
        auth()->user()->unfollow($user);
      } else {
        auth()->user()->follow($user);
      }

      return redirect()->back();
    }

  }
