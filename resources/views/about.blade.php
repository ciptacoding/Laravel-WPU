@extends('layout.main')

@section('content')
<div class="container" style="height: 1vh">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-3">
        <img src="https://source.unsplash.com/800x400/?people" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h4 class="card-title">About Me</h4>
          <h4 class="card-text">Name : {{ $name }}</h4>
          <h4 class="card-text">Email : {{ $email }}</h4>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection