@extends('dashboard.layout.main')
{{-- @dd($categories) --}}
@section('main-content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="text-dark">{{ $headTitle }}</h4>
      </div>
      <div class="mb-3">
        <a href="/dashboard/posts" class="btn btn-secondary btn-sm border-0"><i data-feather="arrow-left-circle"></i> Back to my posts</a>
      </div>
      <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
          @csrf 

          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
            <div class="invalid-feedback">
              @error('title')
                {{ $message }}
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
            <div class="invalid-feedback">
              @error('slug')
                {{ $message }}
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                  @if (old('category_id') == $category->id)
                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>  
                  @endif
                @endforeach
              </select>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <img src="" class="img-preview img-fluid mb-2 col-sm-6">
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
            <div class="invalid-feedback">
              @error('image')
                {{ $message }}
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}" required>
            <trix-editor input="body"></trix-editor>
            @error('body')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary btn-sm mb-5">Create Post</button>
        </form>
      </div>
    </main>

    <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
      });

      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      });

      // preview image
      function previewImage()
      {
        const image = document.querySelector('#image');
        const previewImage = document.querySelector('.img-preview');
        previewImage.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);
        
        ofReader.onload = function(oFREvent){
          previewImage.src = oFREvent.target.result;
        }
      }
    </script>
@endsection
