@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
{{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">CREATE POST</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <a href="/dashboard/posts/{{ $post->slug }}" style="text-decoration: none">
              {{ $post->title }}
            </a>
          </td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-info" style="text-decoration: none; color: white">
                <span>EDIT</span>
            </a>
            <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Delete this post?')"><span style="text-decoration: none">DELETE</span></button>
            </form>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection