@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8">

      @foreach ($posts as $post)
        @include('_post')
      @endforeach

      <div class="pagination pagination-lg justify-content-center mb-5">
        {{ $posts->links() }}
      </div>

    </div>

    <div class="col-md-4 d-none d-lg-block">

      <div class="d-flex order-sm-0 align-items-center mb-5">
        <a href="{{ auth()->user()->getProfileUrl() }}">
          <img src="{{ auth()->user()->getAvatar() }}"
               alt="{{ auth()->user()->name }}"
               class="d-inline-block profile-image-md rounded-circle mr-3">
        </a>
        <div>
          <a href="{{ auth()->user()->getProfileUrl() }}"
             class="font-weight-600 text-gray-dark mb--1 d-block">{{ auth()->user()->username }}</a>
          <small class="text-gray">{{ auth()->user()->name }}</small>
        </div>
      </div>

      @include ('_suggestion-list')

    </div>
  </div>
@endsection
