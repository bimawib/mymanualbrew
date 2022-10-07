@extends('dashboard.layouts.main')

@section('container')
<div class="kosong">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="text-center">Create new Post</h1>
    </div>
</div>
<div class="col-lg-8">
<form method="post" action="/dashboard/posts" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label name="title" for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="slug" name="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" required>
        @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="category" name="category" class="form-label">Category</label>
        <select name="category_id" class="form-select">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    {{-- <div class="mb-3">
        <label for="image" class="form-label">Upload an Image</label>
        <img class="img-preview img-fluid mb-1 col-sm-5">
        <input class="form-control mt-1 @error('image') is-invalid
         @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div> --}}
    <div class="mb-3">
        <label for="body" name="body" class="form-label">Body</label>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body">
        <trix-editor input="body"></trix-editor>
    </div>
    
    
    <button type="submit" class="btn btn-primary mb-5">Create Post</button>
</form>
</div>
</div>

<script>
    const title = document.querySelector('.mb-3 #title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change',function(){
        fetch('/dashboard/post/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload=function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection