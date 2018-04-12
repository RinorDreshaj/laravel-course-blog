@extends('layouts.app')

@section('content')
<ul>
    @foreach($posts as $post)
        <li>
            <h4>{{ $post->title }}</h4>
            <p>{{ $post->created_at }}</p>
            <p>{{ $post->comments->count() }}</p>
            <form action="{{ url("users/posts/$post->id") }}" method="POST">
                {{ csrf_field() }}
                {{ method_field("DELETE") }}
                <button class="btn btn-danger delete-button">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection