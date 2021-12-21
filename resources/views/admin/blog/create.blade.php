@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2>Create Blog</h2>
    @if (count($errors->all()) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    <div class="container">
        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group m-3">
                <label for="title">Title</label>
                <input value="{{ old('title') }}" type="text" maxlength="9" class="form-control" name="title" id="title"
                    placeholder="name@example.com">
            </div>
            <div class="form-group m-3">
                <label for="reacts">Reacts</label>
                <input value="{{ old('reacts') }}" type="number" class="form-control" name="reacts" id="reacts"
                    placeholder="5">
            </div>
            <div class="form-group m-3">
                <label for="img">Image</label>
                <input type="file" class="form-control" name="img" id="img"
                    placeholder="5">
            </div>
            <div class="form-group m-3">
                <label class="d-block" for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10"> {{ old('content') }}</textarea>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save Blog</button>
        </form>
    </div>
</main>
@endsection
