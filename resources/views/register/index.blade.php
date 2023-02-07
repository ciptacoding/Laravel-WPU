@extends('layout.main')

@section('content')
    <main class="form-signin w-100 m-auto">
      <div class="row justify-content-center align-items-center" style="height: 80vh">
        <div class="col-lg-5">
          <div class="card p-4 shadow">
            <form method="post" action="/register">
              @csrf
              <h1 class="h3 mb-3 fw-normal text-center">Please sign up</h1>

              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}" style="background-color: #E8F0FE" required>
                <label for="name">Name</label>
                @error('name')
                  <div class="invalid-feedback mt-0">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" style="background-color: #E8F0FE" required>
                <label for="username">Username</label>
                @error('username')
                  <div class="invalid-feedback mt-0">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" style="background-color: #E8F0FE" required>
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback mt-0">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"  style="background-color: #E8F0FE" requiredregis>
                <label for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback mt-0">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Register</button>
              <p class="d-block text-center mb-3 text-muted">&copy; 2022 – {{ date('Y') }}</p>
              <p class="text-center">Already registered? <a href="/login">Login!</a></p>
            </form>
          </div>
        </div>
      </div>
    </main>
@endsection