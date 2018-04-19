@extends('layouts.app')

@section('content')
    <section id="bricks">
        <div class="row masonry">
            You have {{ $posts->total() }} posts
            <div class="bricks-wrapper">
                <div class="grid-sizer"></div>
                @foreach($posts as $post)
                    <article class="brick entry format-standard animate-this">
                        <div class="entry-thumb">
                            <a href="{{ url("posts/$post->id") }}" class="thumb-link">
                                <img src="{{ url('storage').'/'. $post->media}}" alt="building">
                            </a>
                        </div>
                        <div class="entry-text">
                            <div class="entry-header">
                                <div class="entry-meta">
               			<span class="cat-links">
               				<a href="#">{{ $post->category_name }}</a>
               			</span>
                                </div>
                                <h1 class="entry-title"><a href="{{ url("posts/$post->id") }}">{{ $post->title }}</a></h1>
                            </div>
                            <div class="entry-excerpt">
                                {{ $post->description }}
                            </div>
                        </div>
                    </article> <!-- end article -->
                @endforeach
            </div>
        </div>

        <div class="row">
            {{ $posts->links() }}
        </div>
    </section>

@endsection