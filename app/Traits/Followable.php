<?php

  namespace App\Traits;


  use App\User;

  trait Followable {

    public function follows()
    {
      return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function follow(User $user)
    {
      return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
      return $this->follows()->detach($user);
    }

    public function following(User $user)
    {
      return $this->follows()
        ->where('following_user_id', $user->id)
        ->exists();
    }

    public function followers()
    {
      return User::join('follows', 'follows.user_id', '=', 'users.id')
        ->where('follows.following_user_id', '=', $this->id)
        ->get();
    }

    public function suggestions()
    {
      $followers_id = $this->follows()->pluck('following_user_id')->toArray();

      return $this->followers()
        ->whereNotIn('id', $followers_id)
        ->makeHidden(['password', 'created_at', 'updated_at', 'email_verifyed_at', 'remember_token']);
    }

    public function explore()
    {
      $ids = $this->follows()->pluck('following_user_id');
      $ids->push($this->id);

      return User::whereNotIn('id', $ids)->paginate(15);
    }

  }