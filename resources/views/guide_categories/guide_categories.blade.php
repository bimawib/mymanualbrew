

@extends('layouts.main')

{{-- extends relatif ke folder view --}}

@section('child-container')

{{-- <h1>myManualBrew - Blogs</h1> --}}
<h1>Guide Categories</h1>

@foreach ($guide_categories as $guide_category)

<ul>
    <li>
        <a href="/guide_categories/{{ $guide_category->slug }}">
            <h2>{{ $guide_category->name }}</h2>
        </a>
    </li>
</ul>

<article class="mb-5">
</article>
@endforeach

@endsection