@extends('layouts.app')

@section('content')
    <a href="{{ url('users/posts/create') }}">Add new Post</a>
<ul>
    @foreach($posts as $post)
        <li>
            <h4>{{ $post->title }}, {{ $post->created_at->format('Y - m - d') }} , - Comments: {{ $post->comments->count() }} </h4>
            <form action="{{ url("users/posts/$post->id") }}" method="POST">
                {{ csrf_field() }}
                {{ method_field("DELETE") }}
                <button class="btn btn-danger delete-button">Delete</button>
            </form>

            <a href="{{ url("users/posts/$post->id/edit") }}" class="btn btn-danger">Edit</a>
        </li>
    @endforeach
</ul>
@endsection