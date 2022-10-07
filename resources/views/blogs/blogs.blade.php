

@extends('layouts.main')

{{-- extends relatif ke folder view --}}

@section('child-container')

<h1 class="mb-5 text-center features2">{{ $title }}</h1>



@if($posts->count())
<div class="card mb-5 text-center lexend halblog" style="margin: 0px 5vw; border: 2px solid rgb(168, 163, 139); border-radius: 13px">
    {{-- <a href="/blogs/{{ $posts[0]->slug }}" > --}}
      {{-- @if($posts[0]->image)
      <a href="/blogs/{{ $posts[0]->slug }}" style="max-height: 400px; min-width:400px; overflow:hidden;">
            <img style="max-height: 400px; overflow:hidden" src="{{ asset('storage/'.$posts[0]->image) }}"  alt="userpost" class="mt-3 mb-3 img-fluid" style="border-radius: 13px">
      </a>
      @else@endif --}}
            <img src="{{ URL::asset('img/landing-pic.jpg') }}" class="mb-3 img-fluid" style="border-radius: 13px">
            
      
    {{-- </a> --}}
    <div class="card-body">
        <a href="/blogs/{{ $posts[0]->slug }}" class="text-decoration-none" style="color: black; font-size: 2.5vw"><h5 class="card-title">{{ $posts[0]->title }}</h5></a>
        <p><small class="text-muted" style="color: black">By 
          {{-- <a class="text-decoration-none" style="color: black" href="/author/{{ $posts[0]->user->username }}"></a> --}}
          {{ $posts[0]->user->name }} {{ $posts[0]->created_at->diffForHumans() }}</small></p>
    </div>
</div>

@foreach ($posts->skip(1) as $post)
<article class="mb-2 pb-4 lexend" style="margin: 0px 6vw;">
<div class="container" >
    <div class="row">
        <div class="card" style="border: 2px solid rgb(168, 163, 139)">
            <div class="card-body">
              <h5 class="card-title"><a class="text-decoration-none" style="color: black" href="/blogs/{{ $post->slug }}">{{ $post->title }}</a></h5>
              <p><small style="color: black" class="text-muted">By {{ $post->user->name }} {{$post->created_at->diffForHumans() }}</small></p>
              <a href="/blogs/{{ $post->slug }}" class="text-decoration-none" style="color: royalblue">Read More</a>
            </div>
          </div>
    </div>
</div>

</article>
@endforeach

@else
<p class="text-center features">No Post Found</p>
@endif

<div class="halohalo">
@php
if($posts->links()){
    if($posts->nextPageUrl() > 0 && $posts->previousPageUrl() > 0){
        echo "<a href=".($posts->previousPageUrl())."><</a>"."<a href=".($posts->nextPageUrl()).">></a>";
    } elseif ($posts->nextPageUrl() > 0) {
      echo "<a href=".($posts->nextPageUrl()).">></a>";
    } elseif ($posts->previousPageUrl() > 0) {
      echo "<a href=".($posts->previousPageUrl())."><</a>";
    } else {
      
    }
}
@endphp
</div>

@endsection