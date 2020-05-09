@extends ('layouts.app')

@section('title',  $user->name .' (@'. $user->username.') • Instagram')

@section('content')
  <div class="row">

    <div class="col-md-4 text-center mb-4 mb-md-0">
      <img src="{{ $user->getAvatar() }}"
           alt="{{ $user->name }}"
           class="profile-image rounded-circle">
    </div>

    <div class="col-md-8 overflow-hidden">

      <div class="d-flex justify-content-center justify-content-md-start">
        <h3 class="text-gray-dark font-weight-100 mr-3 mb-0 btn-outline-">{{ $user->username }}</h3>

        @can ('edit', $user)
          <a href="{{ route('users.edit', [$user]) }}" class="d-inline-block  btn btn-outline-default mr-3 mb-sm-2">Edit
            Profile</a>

          <button class="border border-0 bg-transparent mb-sm-2"
                  data-toggle="modal"
                  data-target="#exampleModalLong"><i class="fas fa-2x fa-cog"></i></button>
        @endcan
        <x-follow-button :user="$user"></x-follow-button>
      </div>

      <ul class="mt-3 d-flex justify-content-center justify-content-md-start list-unstyled">
        <li class="mr-5"><span class="font-weight-600 mr-1">{{ $user->posts()->count() }}</span>Posts</li>
        <li class="mr-5"><span class="font-weight-600 mr-1">{{ $user->followers()->count() }}</span>followers</li>
        <li><span class="font-weight-600 mr-1">{{ $user->follows()->count() }}</span>following</li>
      </ul>

      <div>
        <p class="font-weight-600 mb-1">{{ $user->name }}</p>
        <p class="text-dark">{{ $user->bio }}</p>
      </div>

    </div>

  </div>

  <div class="row mt-5">
    @forelse($user->posts as $post)

      <div class="col-md-4 mb-4">
        <a href="{{ $post->path() }}">
          <img src="{{ $post->getImageUrl() }}" class="img-fluid rounded-lg" alt="">
        </a>
      </div>

    @empty
      <div class="col-md-12 text-center">
        <h4>didn't have any post yet.</h4>
      </div>
    @endforelse
  </div>


  @can('edit', $user)
    <!-- Setting Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content text-center rounded-lg overflow-hidden">

          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a href="{{ route('password.change') }}" class="text-gray">Change Password</a>
            </li>
            <li class="list-group-item">
              <form action="{{ route('logout') }}" method="post">
                @csrf

              <button class="border border-0 text-gray bg-transparent">Logout</button>
              </form>
            </li>
            <li class="list-group-item text-gray" data-dismiss="modal" style="cursor: pointer">Cancel</li>
          </ul>

        </div>
      </div>
    </div>
  @endcan

@endsection
