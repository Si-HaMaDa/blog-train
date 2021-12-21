@extends('layouts.app')

@section('title', 'Comments')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


    @if (session()->has('success'))
    <div class="alert alert-success mt-4">{{ session('success') }}</div>
    @endif


    <h2>Comments</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">body</th>
                    <th scope="col">user</th>
                    <th scope="col">likes</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($comments) > 0)
                @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ substr($comment->body, 0, 50) }}...</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->likes }}</td>
                    <td>
                        <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-success btn-sm">Show</a> |
                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
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
