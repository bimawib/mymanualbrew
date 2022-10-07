

@extends('layouts.main')

{{-- extends relatif ke folder view --}}

@section('child-container')

{{-- <h1>myManualBrew - Blogs</h1> --}}
<h1>Guide Category: {{ $guide_category }}</h1>

@foreach ($guides as $guide)
<article class="mb-5">
    <a href="/guides/{{ $guide->slug }}">
        <h2>{{ $guide->title }}</h2>
    </a>
    <h5>Origin : {{ $guide->origin }} <br> 
        Process : {{ $guide->proses }}</h5>
</article>
@endforeach

@endsection