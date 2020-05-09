@extends ('layouts.app')

@section('title',  'Create Post • Instagram')


@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h3>Edit Post</h3></div>

        <div class="card-body">
          <form action="{{ $post->path() }}" method="post" id="createPostForm" enctype="multipart/form-data">
            @csrf
            @method ('PATCH')

            <div class="row justify-content-center">
              <div class="col-md-10">

                <div class="form-group @error('image') has-danger @enderror">
                  <input type="file"
                         name="image"
                         id="image"
                         class="form-control form-control-alternative @error('image') is-invalid @enderror">

                  @error('image')
                  <span class="invalid-feedback mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                <textarea class="form-control form-control-alternative"
                          rows="3"
                          name="caption"
                          id="caption"
                          placeholder="write your caption ...">{{ old('caption') ?? $post->caption }}</textarea>

                  @error('caption')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

              </div>

            </div>
            <div class="row justify-content-center">
              <div class="col-md-10">
                <a href="{{ $post->path() }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
@endsection