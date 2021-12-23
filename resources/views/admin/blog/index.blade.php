@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


    @if (session()->has('success'))
    <div class="alert alert-success mt-4">{{ session('success') }}</div>
    @endif


    <h2>Blogs</h2>
    <a href="{{ route('blogs.create') }}" class="btn btn-success">Add</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">reacts</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($blogs) > 0)
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->reacts }}</td>
                    <td><img width="75" src="{{ url('storage/'.$blog->img) }}"></td>
                    <td>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-success btn-sm">Show</a> |
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm">Edit</a> |
                        <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
        <style>
            form {
                display: inline-block;
            }

            .active {
                background: #ccc;
            }
        </style>

    </div>
</main>
@endsection
