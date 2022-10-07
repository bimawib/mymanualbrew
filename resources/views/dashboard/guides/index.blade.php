@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Guides</h1>
</div>


@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
{{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
    <a href="/dashboard/guides/create" class="btn btn-primary mb-3">CREATE GUIDE</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Methods</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($guides as $guide)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <a href="/dashboard/guides/{{ $guide->slug }}" style="text-decoration: none">
              {{ $guide->title }}
            </a>
          </td>
          <td>{{ $guide->guide_category->name }}</td>
          <td>
            <a style="color: white; text-decoration:none;" href="/dashboard/guides/{{ $guide->slug }}/edit" class="badge bg-info" style="text-decoration: none">
                <span>EDIT</span>
            </a>
            <form action="/dashboard/guides/{{ $guide->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Delete this guide?')">
                <span style="text-decoration: none">DELETE</span>
              </button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection