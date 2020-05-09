<div class="card mb-5">
  <div class="card-header bg-white">
    <a href="{{ $post->user->path() }}" class="text-gray-dark">
      <img src="{{ $post->user->getAvatar() }}"
           alt="{{ $post->user->name }}"
           class="rounded-circle mr-2"
           style="height: 40px; width: 40px;">
      <small>{{ $post->user->username }}</small>
    </a>
  </div>

  <div class="card-body overflow-hidden p-0">
    <a href="{{ $post->path() }}">
      <img src="{{ $post->getImageUrl() }}" alt="Post image"
           class="card-img-top"
           style="height: 550px; width: 100%; ">
    </a>
  </div>

  <div class="card-footer">
    <div class="d-flex mb-2">
      <x-like-button :post="$post"></x-like-button>

      <a href="{{ $post->path() }}" class="text-gray"><i class="far fa-2x fa-comment"></i></a>
    </div>

    <div><small class="text-gray">{{ $post->likes ?: 0 }} likes</small></div>

  </div>
</div>