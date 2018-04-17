@extends('layouts.app')

@section('content')
    <section id="bricks" class="text-center" style="display: flex; align-items: center; justify-content: center">
        <form action="{{ url("users/posts/$post->id") }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <select name="category_id">
                    <option value="" selected disabled>Please choose a category</option>
                    @foreach(\App\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            @if($category->id == $post->category_id)
                                selected
                            @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="text" name="title"  class="form-control" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <textarea name="description" rows="10" class="form-control">{{ $post->description }}</textarea>
            </div>

            <img src="{{ url('storage').'/'. $post->media}}"  class="img-responsive" style="width: 300px; border: 1px solid gray">

            <div class="form-group">
                <input type="file" name="file" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="Save Post">
            </div>
        </form>
    </section>

@endsection