@extends('layouts.app')

@section('title',  'Instagram Photo by '.$post->user->name)

@section('content')

  <div class="row mb-5">
    <div class="col-md-7 px-0">
      <div class="overflow-hidden shadow"></div>
      <img src="{{ $post->getImageUrl() }}"
           alt="{{ $post->user->name }}'s post"
           class="w-100">
    </div>
    <div class="col-md-5 px-0">
      <div class="card d-flex flex-column">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">

          <div>
            <a href="{{$post->user->getProfileUrl()}}">
              <img src="{{ $post->user->getAvatar() }}"
                   alt="{{ $post->user->username }}"
                   class="profile-image-small rounded-circle">
            </a>
          </div>

          <div>
            <a href="{{$post->user->getProfileUrl()}}"
               class="text-gray">{{$post->user->username}}</a>
          </div>

          <div>
            <x-follow-button :user="$post->user" class="btn-sm"></x-follow-button>
          </div>

          @can ('edit', $post)
            <div class="dropdown">
            <span id="postDropdownButton"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  style="cursor: pointer;"><i class="fas fa-ellipsis-h"></i></span>
              <div class="dropdown-menu" aria-labelledby="postDropdownButton">
                <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                <form action="{{ $post->path() }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="dropdown-item">Delete Post</button>
                </form>
              </div>
            </div>
          @endcan

        </div>

        <div class="card-body flex-grow-1" style="height: 21.5rem; overflow: auto;">
          @foreach($post->comments as $comment)
            <x-comment :post="$post" :comment="$comment"></x-comment>
          @endforeach
        </div>

        <div class="card-footer text-gray">
          <div>
            <div class="d-flex mb-2">
              <x-like-button :post="$post"></x-like-button>

              <a href="{{ $post->path() }}" class="text-gray"><i class="far fa-2x fa-comment"></i></a>
            </div>

            <p class="mb-1">{{ $post->likes ?: 0 }} likes</p>

            <div><small class="text-gray-dark">{{ ($post->created_at)->diffForHumans() }}</small></div>
          </div>

          <div class="mt-4">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
              @csrf

              <div class="d-flex justify-content-between">
                <input type="text"
                       name="body"
                       class="form-control w-75"
                       placeholder="Add a comment">
                <button type="submit" class="btn btn-link">POST</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>

@endsection