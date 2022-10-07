

@extends('layouts.main')

{{-- extends relatif ke folder view --}}

@section('child-container')

{{-- <h1>myManualBrew - Blogs</h1> --}}
<h1>Post Categories</h1>

@foreach ($categories as $category)

<ul>
    <li>
        <a href="/categories/{{ $category->slug }}">
            <h2>{{ $category->name }}</h2>
        </a>
    </li>
</ul>

<article class="mb-5">
    

</article>
@endforeach

@endsection