@extends('dashboard.layouts.main')

@section('container')
<div class="container lexend mt-3" style="margin: 5px auto">
    <div class="row mb-5">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="tool"></span> Edit</a>
            <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('are you sure?')"><span data-feather="x-square"></span> Delete</button>
            </form>
            <br>
            @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" alt="userpost" class="mt-3 mb-3 img-fluid" style="border-radius: 13px">
            @else
            <img src="https://source.unsplash.com/1200x600?coffee" alt="unsplash-coffee" class="mt-3 mb-3 img-fluid" style="border-radius: 13px">
            @endif
            
            <article class="my-3">
                {!! $post->body !!}
            </article>
            
            
        </div>
    </div>
</div>
@endsection