@extends('layout.main')

@section('content')
    <main class="form-signin w-100 m-auto">
      <div class="row justify-content-center align-items-center" style="height: 80vh">
        <div class="col-lg-5">
          <div class="card p-5 shadow">
            <form>
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

            <div class="form-floating">
              <input type="email" class="form-control mb-3" id="email" name="email" placeholder="name@example.com" style="background-color: #E8F0FE">
              <label for="email">Email address</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password" style="background-color: #E8F0FE">
              <label for="password">Password</label>
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