@extends ('layouts.app')

@section('title',  'Explore • Instagram')

@section ('content')

  <div class="row justify-content-center">
    <div class="col-md-6">

      <h4 class="text-gray font-weight-bold">Explore</h4>

      @forelse ($users as $user)

        <div class="card {{$loop->last ? 'mb-5' : 'mb-3'}} shadow-sm shadow--hover">
          <div class="card-body">
            <x-user-detail-card :user="$user"></x-user-detail-card>
          </div>
        </div>

      @empty
        <p class="alert alert-danger">Users Not found.</p>
      @endforelse

      <div class="pagination pagination-lg justify-content-center mb-5">
        {{ $users->links() }}
      </div>

    </div>
  </div>

@endsection