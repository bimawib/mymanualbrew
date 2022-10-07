

@extends('layouts.main')

{{-- extends relatif ke folder view --}}

@section('child-container')

<h1 class="mb-5 text-center features2">{{ $title }}</h1>

@if($guides->count())

@foreach ($guides as $guide)
<a href="/guides/{{ $guide->slug }}"></a>
<article class="mb-3 pb-4 lexend" style="margin: 0px 6vw;">
    <div class="container">
        <div class="row">
            <div class="card" style="border: 3px solid rgb(168, 163, 139)">
                <div class="card-body">
                  <h5 class="card-title"><a class="text-decoration-none" style="color: black" href="/guides/{{ $guide->slug }}">{{ $guide->title }} </a></h5>
                  <p><small style="color: black" class="text-muted">By {{ $guide->user->name}}  {{$guide->created_at->diffForHumans() }}</small></p>
                  <h6><em>Origin : {{ $guide->origin }} ({{ $guide->proses }})</em></h6>
                  <h6><em>Method : {{ $guide->guide_category->name }}</em></h6>
                  <a href="/guides/{{ $guide->slug }}" class="text-decoration-none" style="color: royalblue">Read More</a>
                </div>
              </div>
        </div>
    </div>
    
</article>

@endforeach

@else
<p class="text-center features">No Guide Found</p>
@endif

<div class="halohalo">
@php
if($guides->links()){
    if($guides->nextPageUrl() > 0 && $guides->previousPageUrl() > 0){
      echo "<a href=".($guides->previousPageUrl())."><</a>"."<a href=".($guides->nextPageUrl()).">></a>";
    } elseif ($guides->nextPageUrl() > 0) {
      echo "<a href=".($guides->nextPageUrl()).">></a>";
    } elseif ($guides->previousPageUrl() > 0) {
      echo "<a href=".($guides->previousPageUrl())."><</a>";
    } else {
    }
}
@endphp
</div>

@endsection