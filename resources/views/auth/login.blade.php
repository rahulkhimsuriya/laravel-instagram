@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-5">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white">
            <h3 class="text-muted text-center">Sign in</h3>
          </div>
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" action="{{ route('login') }}" method="POST">
              @csrf

              <div class="form-group mb-3 @error('email') has-danger @enderror">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input type="email"
                         class="form-control @error('email') form-control-alternative is-invalid @enderror"
                         name="email"
                         value="{{ old('email') }}" placeholder="Email">

                  @error('email')
                  <span class="invalid-feedback p-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
                </div>
              </div>

              <div class="form-group focused @error('password') has-danger @enderror">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input type="password"
                         class="form-control @error('password') form-control-alternative is-invalid @enderror"
                         name="password"
                         placeholder="Password">

                  @error('password')
                  <span class="invalid-feedback p-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>

              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input"
                       id="remember"
                       name="remember"
                       type="checkbox"
                  {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember"><span>Remember me</span></label>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Sign in</button>
              </div>

            </form>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-6">
            <a href="{{ route('password.request') }}" class="text-gray"><small>Forgot password?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-gray"><small>Create new account</small></a>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
