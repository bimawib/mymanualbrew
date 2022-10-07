@extends('dashboard.layouts.main')

<script>
    window.location.replace('/dashboard/users')
</script>

@section('container')
<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
</div>
@endsection