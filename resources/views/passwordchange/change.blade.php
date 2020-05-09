@extends ('layouts.app')

@section('title',  'Chnage Password • Instagram')


@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h3>Password Chnage</h3></div>

        <div class="card-body">

          <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group row @error('old_password') has-danger @enderror">
              <label for="old_password" class="col-md-3 text-md-right col-form-label">Old Password:</label>
              <div class="col-md-9">
                <input type="password"
                       class="form-control form-control-alternative @error('old_password') is-invalid @enderror"
                       name="old_password"
                       id="old_password">

                @error('old_password')
                <span class="invalid-feedback mt-1" role="alert">
                          <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row @error('password') has-danger @enderror">
              <label for="password" class="col-md-3 text-md-right col-form-label">New Password:</label>
              <div class="col-md-9">
                <input type="password"
                       class="form-control form-control-alternative @error('password') is-invalid @enderror"
                       name="password"
                       id="password">

                @error('password')
                <span class="invalid-feedback mt-1" role="alert">
                          <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row @error('password_confirmation') has-danger @enderror">
              <label for="password_confirmation" class="col-md-3 text-md-right col-form-label">Password
                Confirmation:</label>
              <div class="col-md-9">
                <input type="password"
                       class="form-control form-control-alternative @error('password_confirmation') is-invalid @enderror"
                       name="password_confirmation"
                       id="password_confirmation">

                @error('password_confirmation')
                <span class="invalid-feedback mt-1" role="alert">
                          <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>


            <div class="form-group mt-5 row">
              <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="{{ route('users.show', [ Auth::user() ]) }}" class="btn btn-link">Cancel</a>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection