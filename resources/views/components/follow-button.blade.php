@if (auth()->user()->isNot($user))
  <form method="post" action="/users/{{ $user->username }}/follow">
    @csrf

    <button type="submit"
            class="btn @if ($class ?? '') {{$class}} @else btn-primary @endif"
    >{{ auth()->user()->following($user) ? 'Unfollow' : 'Follow Me' }}</button>
  </form>
@endif