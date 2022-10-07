@extends('dashboard.layouts.main')

@section('container')
<div class="kosong">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="text-center">Edit Profile</h1>
    </div>
</div>
<div class="col-lg-8">

  

<form method="post" action="/dashboard/users/{{ $user->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label name="name" for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $user->name), $user->name }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="username" name="username" class="form-label @error('username') is-invalid @enderror">Username</label>
        <input type="text" class="form-control" id="username" name="username" required value="{{ old('username', $user->username), $user->username }}">
        @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="email" name="email" class="form-label @error('email') is-invalid @enderror">Email</label>
      <input type="text" class="form-control" id="email" name="email" readonly value="{{ old('email', $user->email), $user->email }}">
      @error('email')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
    
    <div class="mb-3">
        <label for="about_me" name="about_me" class="form-label @error('about_me') is-invalid @enderror">About Me</label>
        <input type="text" class="form-control" id="about_me" name="about_me" required value="{{ old('about_me', $user->about_me), $user->about_me }}" maxlength="100">
        @error('about_me')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    
    
    {{-- <div class="mb-3">
        <label for="image" class="form-label">Upload an Image</label>
        <input type="hidden" name="oldImage" value="{{ $user->image }}">
        @if($user->image)
        <img src="{{ asset('storage/'.$user->image) }}" class="img-preview img-fluid mb-1 col-sm-5 d-block">
        @else
        <img class="img-preview img-fluid mb-1 col-sm-5">
        @endif
        
        <input class="form-control mt-1 @error('image') is-invalid
         @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

    <div class="mb-3">
        <label for="body" name="body" class="form-label">Body</label>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $user->body), $user->body }}">
        <trix-editor input="body"></trix-editor>
    </div> 
    <div class="mb-3">
        <label for="email" name="email" class="form-label @error('email') is-invalid @enderror">email</label>
        <input type="text" class="form-control" id="email" name="email" required value="{{ old('email', $user->email), $user->email }}">
        @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div> --}}
    
    
    <button type="submit" class="btn btn-primary mt-3 mb-5">Update My Profile!</button>
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