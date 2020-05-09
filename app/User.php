<?php

  namespace App;

  use App\Traits\Followable;
  use Illuminate\Contracts\Auth\MustVerifyEmail;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Illuminate\Notifications\Notifiable;

  class User extends Authenticatable {

    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'email', 'username', 'avatar', 'bio', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'email_verified_at' => 'datetime',
    ];

    public function path()
    {
      return route('users.show', $this->username);
    }

    public function getRouteKeyName()
    {
      return 'username';
    }

    public function getProfileUrl()
    {
      return route('users.show', $this->username);
    }

    public function getAvatar()
    {
      $imagePath = ($this->avatar != null)
        ? $this->avatar
        : '/avatars/default-user-avatar.png';

      return '/storage/' . $imagePath;
    }

    public function timeline()
    {
      $followers = $this->follows()->pluck('id');

      return Post::whereIn('user_id', $followers)
        ->orWhere('user_id', $this->id)
        ->withLikes()
        ->latest()
        ->paginate(10);
    }

    public function posts()
    {
      return $this->hasMany(Post::class)->latest();
    }

    public function likes()
    {
      return $this->hasMany(Like::class);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

  }
