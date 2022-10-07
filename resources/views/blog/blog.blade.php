
@extends('layouts.main')

@section('child-container')
<hr style="margin-bottom: 2vh">
<div class="container lexend mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>By <a style="text-decoration: none" href="/users/{{ $post->user->username }}">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }}</p>
            
            @if($post->image)
                <img style="max-height: 400px; overflow:hidden;" src="{{ asset('storage/'.$post->image) }}" alt="userpost" class="img-fluid" style="border-radius: 13px">
            @else
            <img src="https://source.unsplash.com/1200x600?coffee" alt="unsplash-coffee" class="img-fluid" style="border-radius: 13px">
            @endif
            <article class="my-3">
                {!! $post->body !!}
            </article>
            
            <a href="/blogs" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Blogs</a>
        </div>
    </div>
</div>






@endsection

