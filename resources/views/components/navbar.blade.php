<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm mb-5">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('/img/logo.png') }}" alt="Instgram">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto align-items-center">
        <!-- Authentication Links -->
        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="{{ route('posts.create') }}">
            <i class="fas fa-plus"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="{{ route('posts.index') }}">
            <i class="fas fa-home"></i>
            <span class="nav-link-inner--text d-lg-none">Home</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="{{ route('explore.index') }}">
            <i class="far fa-compass"></i>
            <span class="nav-link-inner--text d-lg-none">Explorer</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-link-icon" href="{{ auth()->user()->path() }}">
            <img src="{{ auth()->user()->getAvatar()  }}"
                 alt="{{ auth()->user()->username }}"
                 class="rounded-circle" style="width: 38px; height: 38px;">
            <span class="nav-link-inner--text d-lg-none">Profile</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>