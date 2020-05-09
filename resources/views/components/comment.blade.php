<div class="d-flex mb-2">
  <div class="mr-3">
    <a href="{{ $comment->user->getProfileUrl() }}">
      <img src="{{ $comment->user->getAvatar() }}"
           alt="{{ $comment->user->username }}"
           class="profile-image-small rounded-circle">
    </a>
  </div>

  <div>
    <a href="{{ $comment->user->getProfileUrl() }}"
       class="mr-1 text-gray-dark font-weight-bold">{{ $comment->user->username }}</a>
    <small>{{ $comment->body }}</small>
    <small class="d-block text-gray font-weight-bold">{{ ($comment->created_at)->diffForHumans() }}</small>
  </div>

  @can('delete', $comment)
    <div class="dropdown ml-auto">
                  <span id="postDropdownButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        style="cursor: pointer;"><i class="fas fa-ellipsis-h"></i></span>
      <div class="dropdown-menu" aria-labelledby="postDropdownButton">
        <form action="{{ route('comments.destroy', [ 'post' => $post->id, 'comment'=> $comment->id ]) }}"
              method="POST">
          @csrf
          @method('DELETE')

          <button type="submit" class="dropdown-item">Delete Post</button>
        </form>
      </div>
    </div>
  @endcan
</div>