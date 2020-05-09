<?php

  namespace App\Http\Controllers;

  use App\Post;
  use Illuminate\Http\Request;
  use Intervention\Image\Facades\Image;

  class PostController extends Controller {

    public function index()
    {
      return view('posts.index', [
        'posts' => auth()->user()->timeline(),
      ]);
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      $validateData = request()->validate([
        'caption' => ['', 'min:3', 'max:255'],
        'image' => ['required', 'file', 'image', 'mimes:jpeg,png'],
      ]);

      $imagePath = request('image')->store('posts', 'public');

      $image = Image::make(public_path('storage/' . $imagePath))->fit(1200, 1200);
      $image->save();

      auth()->user()->posts()->create([
        'caption' => $validateData['caption'],
        'image' => $imagePath,
      ]);

      return redirect(auth()->user()->getProfileUrl())->withSuccess('Post created successfully.');
    }

    public function show(Post $post)
    {
      $post = Post::with('comments.user')
        ->withLikes()
        ->find($post->id);

      return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
      $this->authorize('edit', $post);

      return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
      $this->authorize('edit', $post);

      $validatedData = request()->validate([
        'caption' => ['', 'min:3', 'max:255'],
        'image' => ['', 'file', 'image', 'mimes:jpeg,png'],
      ]);

      if (request()->hasFile('image')) {
        $imagePath = request('image')->store('posts', 'public');

        $image = Image::make(public_path('storage/' . $imagePath))->fit(1200, 1200);
        $image->save();

        $validatedData['image'] = $imagePath;
      }

      $post->update($validatedData);

      return redirect($post->path())->withSuccess('Post updated successfully.');
    }

    public function destroy(Post $post)
    {
      $this->authorize('edit', $post);

      $post->delete();

      return redirect(auth()->user()->getProfileUrl())->withSuccess('Post deleted successfully.');
    }

  }
