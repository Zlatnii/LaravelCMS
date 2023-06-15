<x-header />

<body style="margin-left: 15px;">
  @extends('layouts.app')
  @section('content')
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="{{ Storage::url($user->img_path) }}"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5>{{ $user->name}}</h5>
              <h5>{{ $user->surname}}</h5>
              <p></p>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Profile</h6>
                <h5>{{ $user->name }}</h5>
                <h5>{{ $user->surname }}</h5>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">{{ $user->email }}</p>
                  </div>
                </div>
                <h6>{{ app('App\Http\Controllers\RoleController')->getRoleName($user->role) }}</h6>
                <hr class="mt-0 mb-4">
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<x-footer />
  @endsection