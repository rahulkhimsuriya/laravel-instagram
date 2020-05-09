@extends ('layouts.app')

@section('title',  'Edit Profile • Instagram')


@section('content')

  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header"><h3>Profile Update</h3></div>

          <div class="card-body">

            <form action="{{ route('users.update', $user->username) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')

              <div class="form-group row justify-content-center align-items-center">
                <div class="col-md-3 text-md-right overflow-hidden">
                  <img src="{{ $user->getAvatar() }}"
                       class="profile-image-small rounded-circle"
                       alt="{{ $user->username }}">
                </div>
                <div class="col-md-9">
                  <div class="form-group @error('avatar') has-danger @enderror">
                    <h5>{{ $user->username }}</h5>
                    <input type="file"
                           class="form-control form-control-alternative @error('avatar') is-invalid @enderror"
                    name="avatar"
                    id="avatar">

                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group row @error('name') has-danger @enderror">
                <label for="name" class="col-md-3 text-md-right col-form-label">Name:</label>
                <div class="col-md-9">
                  <input type="text"
                         class="form-control form-control-alternative @error('name') is-invalid @enderror"
                         name="name"
                         id="name"
                         value="{{ old('name') ?? $user->name }}"
                         placeholder="Name">

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

              </div>

              <div class="form-group row @error('username') has-danger @enderror">
                <label for="username" class="col-md-3 text-md-right col-form-label">Username:</label>
                <div class="col-md-9">
                  <input type="text"
                         class="form-control form-control-alternative @error('username') is-invalid @enderror"
                         name="username"
                         id="username"
                         value="{{ old('username') ?? $user->username }}"
                         placeholder="Username">

                  @error('username')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row @error('bio') has-danger @enderror">
                <label for="bio" class="col-md-3 text-md-right col-form-label">Bio:</label>
                <div class="col-md-9">
                  <textarea class="form-control form-control-alternative border border-secondary form-control-alternative @error('bio') is-invalid @enderror"
                            rows="3"
                            name="bio"
                            id="bio"
                            placeholder="Write a something about you ...">{{ old('bio') ??$user->bio }}</textarea>

                  @error('bio')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row @error('email') has-danger @enderror">
                <label for="staticEmail" class="col-md-3 text-md-right col-form-label">Email Address:</label>
                <div class="col-md-9">
                  <input type="email"
                         class="form-control form-control-alternative @error('email') is-invalid @enderror"
                         name="email"
                         id="email"
                         value="{{ old('email') ?? $user->email }}"
                         placeholder="Email Address" disabled>

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group mt-5 row">
                <div class="col-md-9 offset-md-3">
                  <button type="submit" class="btn btn-success">Save Changes</button>
                  <a href="{{ $user->path() }}" class="btn btn-link">Cancel</a>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>

  </div>

@endsection