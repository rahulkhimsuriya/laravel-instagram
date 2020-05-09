@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8 col-lg-5">

        <div class="card-header bg-white">
          <h3 class="text-muted text-center">Register</h3>
        </div>

        <div class="card">
          <div class="card-body bg-secondary px-lg-5 py-lg-5">

            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group @error('name') has-danger @enderror">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
                  <input type="text"
                         name="name"
                         class="form-control @error('name') is-invalid @enderror"
                         value="{{ old('name') }}"
                         placeholder="Full Name" >

                 @error('name')
                       <span class="invalid-feedback p-2" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
              </div>

              <div class="form-group @error('email') has-danger @enderror">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input type="email"
                         name="email"
                         class="form-control @error('email') is-invalid @enderror"
                         value="{{ old('email') }}"
                         placeholder="Email">

                  @error('email')
                  <span class="invalid-feedback p-2" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                  @enderror
                </div>
              </div>

              <div class="form-group @error('username') has-danger @enderror">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                  </div>
                  <input type="text"
                         name="username"
                         class="form-control @error('username') is-invalid @enderror"
                         value="{{ old('username') }}"
                         placeholder="Username" >

                  @error('username')
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
                         name="password"
                         class="form-control @error('password') is-invalid @enderror"
                         placeholder="Password">

                  @error('password')
                  <span class="invalid-feedback p-2" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                  @enderror
                </div>
              </div>


              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Create account</button>
              </div>

            </form>

          </div>
        </div>

        <div class="row mt-3 justify-content-center">
          <div class="col-6">
            <small>Already have account ? <a href="{{ route('login') }}">Singin</a>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
