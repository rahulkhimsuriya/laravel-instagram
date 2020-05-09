<div class="media align-items-center">
  <a href="{{ $user->path() }}">
    <img src="{{ $user->getAvatar() }}"
         class="mr-3 rounded-circle profile-image-small"
         alt="{{ $user->username }}">
  </a>

  <div class="media-body">
    <a href="{{ $user->path() }}" class="text-dark font-weight-bold"><h6 class="mt-0 mb--1 text-truncate">{{ $user->username }}</h6></a>
    <small class="text-gray">{{ $user->name }}</small>
  </div>

  <x-follow-button :user="$user" class="btn-sm btn-outline-primary"></x-follow-button>
</div>