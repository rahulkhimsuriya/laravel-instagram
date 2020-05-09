<?php


  namespace App\Traits;


  use App\Like;
  use App\User;
  use Illuminate\Database\Eloquent\Builder;

  trait Likable {

    public function scopeWithLikes(Builder $query)
    {
      $query->leftJoinSub(
        'SELECT post_id, COUNT(*) likes FROM likes GROUP BY post_id',
        'likes',
        'likes.post_id',
        '=',
        'posts.id'
      );
    }

    public function likes()
    {
      return $this->hasMany(Like::class);
    }

    public function like($user = null)
    {
      $this->likes()->create([
        'user_id' => $user ? $user->id : auth()->id(),
      ]);
    }

    public function unlike($user = null)
    {
      $this->likes()->delete([
        'user_id' => $user ? $user->id : auth()->id(),
      ]);
    }

    public function isLikedByUser(User $user)
    {
      return (bool) $user->likes->where('post_id', $this->id)->count();
    }

  }