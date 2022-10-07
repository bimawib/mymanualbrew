@extends('dashboard.layouts.main')

@section('container')

@if($profilePicture->profile_pictures != '')
<div class="container mt-5 d-flex justify-content-center">
    <img width="250px" height="250px" style="border-radius: 13px; border: 1px solid black;" src="{{ $profilePicture->profile_pictures }}" alt="profile-picture">
</div>
@else
<div class="container mt-5 d-flex justify-content-center">
    <img width="250px" height="250px" style="border-radius: 13px; border: 1px solid black;" src="{{ URL::asset('img/emptyprofile.png') }}" alt="profile-picture">
</div>
@endif


<form action="/dashboard/users/profile-picture/{{ $profilePicture->user_id }}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- <div class="container border mt-5 d-flex justify-content-center">
        <input type="file" name="image">
    </div> --}}
    <div class="container" style="width: 300px; margin-bottom: 13px">
        <label for="formFile" class="form-label"></label>
        <input class="form-control d-flex justify-content-center" type="file" id="formFile" name="image" required>
    </div>
    {{-- <div class="@error('image') is-invalid @enderror d-flex justify-content-center"></div> --}}
    @error('image')
      <div class="invalid-feedback d-flex justify-content-center mb-3">
        {{ $message }}
      </div>
    @enderror
    <div class="container d-flex justify-content-center" style="width: 300px">
        <button type="submit" class="btn btn-primary">Update Profile Picture!</button>
    </div>
</form>

@endsection

