@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2>Blog</h2>
    <div class="table-responsive">
        <h1>Title: {{ $blog->title }}</h1>
        <p>Content:</p>
        <p>{{ $blog->content }}</p>
        <p>Reacts:</p>
        <p>{{ $blog->reacts }}</p>
        <p>Image:</p>
        <p><img src="{{ $blog->img }}" alt=""></p>
        <p>Users:</p>
        @foreach ($blog->users as $user)
            <p> - {{ $user->name }}</p>
        @endforeach
    </div>
</main>
@endsection
