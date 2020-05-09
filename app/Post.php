<?php

  namespace App;

  use App\Traits\Commentable;
  use App\Traits\Likable;
  use Illuminate\Database\Eloquent\Model;

  class Post extends Model {

    use Commentable, Likable;

    protected $guarded = [];

    public function path()
    {
      return route('posts.show', $this->id);
    }

    public function getImageUrl()
    {
      return '/storage/' . $this->image;
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

  }
