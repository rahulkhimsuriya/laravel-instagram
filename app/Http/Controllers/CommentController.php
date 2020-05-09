<?php

  namespace App\Http\Controllers;

  use App\Comment;
  use App\Post;
  use Illuminate\Http\Request;

  class CommentController extends Controller {

    public function store(Post $post)
    {
      $validateData = request()->validate(['body' => ['required', 'min:3', 'max:255']]);

      $post->comments()->create([
        'user_id' => auth()->id(),
        'body' => $validateData['body'],
      ]);

      return redirect($post->path());
    }

    public function destroy(Post $post, Comment $comment)
    {
      $this->authorize('delete', $comment);

      $comment->delete();

      return redirect($post->path());
    }

  }
