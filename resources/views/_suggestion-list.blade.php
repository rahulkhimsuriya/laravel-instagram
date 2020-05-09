<div class="card rounded p-3">
  <div class="d-flex justify-content-between">
    <h6 class="text-gray">Suggestions For You</h6>
    <a href="{{ route('explore.index') }}" class="text-gray-dark font">See All</a>
  </div>

  <div>

    @forelse(auth()->user()->suggestions() as $user)

      <div class="align-items-center {{ $loop->last ? 'mb-0' : 'mb-2' }}">
        <div class="media align-items-center">
          <a href="{{ $user->path() }}">
            <img src="{{ $user->getAvatar() }}"
                 class="mr-3 rounded-circle profile-image-small"
                 alt="{{ $user->username }}">
          </a>

          <div class="media-body">
            <a href="{{ $user->path() }}"
               class="text-dark font-weight-bold">
              <p class="d-block mt-0 mb--1 text-truncate"
                 style="font-size: 0.9rem;">{{ $user->username }}</p>
            </a>
            <small class="text-gray" style="font-size: 0.8rem;">Follows you</small>
          </div>

          <x-follow-button :user="$user" class="btn-sm btn-outline-primary"></x-follow-button>
        </div>
      </div>

    @empty

      <p class="text-center text-gray-dark">No friend suggetion</p>

    @endforelse

  </div>
</div>