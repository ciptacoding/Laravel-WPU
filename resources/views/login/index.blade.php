@extends('layout.main')

@section('content')
    <main class="form-signin w-100 m-auto">
      <div class="row justify-content-center align-items-center" style="height: 80vh">
        <div class="col-lg-5">

          {{-- alert --}}
          @if (session()->has('regSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('regSuccess') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('loginError') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <div class="card p-5 shadow">
            <form method="post" action="/login">
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

            <div class="form-floating mb-3">
              <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" style="background-color: #E8F0FE" value="{{ old('email') }}" required autofocus>
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" style="background-color: #E8F0FE" required>
              <label for="password">Password</label>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign in</button>
            <p class="d-block text-center mb-3 text-muted">&copy; 2022–{{ date('Y') }}</p>
            <p class="text-center">Don't have an account? <a href="/register">Register now!</a></p>
          </form>
          </div>
          
        </div>
      </div>
    </main>
@endsection