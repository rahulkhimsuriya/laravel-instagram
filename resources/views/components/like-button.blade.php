<form action="{{ $post->path().'/like' }}" method="POST">
  @csrf

  <button
    class="{{$post->isLikedByUser(auth()->user()) ? 'text-primary': 'text-gray'}} border border-0 p-0 mr-2 bg-transparent"
    style="outline: none;">
    @if ($post->isLikedByUser(auth()->user()))
      <i class="fas fa-2x fa-heart"></i>
    @else
      <i class="far fa-2x fa-heart"></i>
    @endif
  </button>
</form>