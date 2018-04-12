@extends('layouts.app')

@section('content')
    <section id="content-wrap" class="blog-single">
        <div class="row">
            <div class="col-twelve">

                <article class="format-standard">

                    <div class="content-media">
                        <div class="post-thumb">
                            <img src="{{ url('storage').'/'. $post->media}}">
                        </div>
                    </div>

                    <div class="primary-content">

                        <h1 class="page-title">{{ $post->title }}</h1>

                        <ul class="entry-meta">
                            <li class="date">
                                {{--@if($post->created_at != null)--}}
                                    {{--{{ $post->created_at->format('F d, Y') }}--}}
                                {{--@else--}}
                                    {{--Data Mungon--}}
                                {{--@endif--}}
                                {{ $post->created_at != null ? $post->created_at->format('F d, Y') : "Data Mungon" }}</li>
                            <li class="cat"><a href="">{{ $post->category_name }}</a></li>
                        </ul>

                        <p class="lead">
                            {{ $post->description }}
                        </p>

                        <div class="author-profile">
                            <img src="{{ url('storage').'/'. $post->user->profile_picture}}" alt="">

                            <div class="about">
                                <h4><a href="#">{{ $post->user->name }}</a></h4>

                                <p>{{ $post->user->description }}</p>

                                <ul class="author-social">
                                    <li><a href="http://{{ $post->user->facebook }}">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">GooglePlus</a></li>
                                    <li><a href="#">Instagram</i></a></li>
                                </ul>
                            </div>
                        </div> <!-- end author-profile -->

                    </div> <!-- end entry-primary -->

                    <div class="pagenav group">
                        @if($previous != null)
                            <div class="prev-nav">
                                <a href="{{ url("posts/$previous->id") }}" rel="prev">
                                    <span>Previous</span>
                                    {{ $previous->title }}
                                </a>
                            </div>
                        @endif

                        @if($next != null)
                            <div class="next-nav">
                                <a href="{{ url("posts/$next_id") }}" rel="next">
                                    <span>Next</span>
                                    {{ $next->title }}
                                </a>
                            </div>
                        @endif
                    </div>

                </article>


            </div> <!-- end col-twelve -->
        </div> <!-- end row -->

        <div class="comments-wrap">
            <div id="comments" class="row">
                <div class="col-full">
                    <h3>{{ $post->comments->count() }} Comments</h3>
                    <ol class="commentlist">
                        @foreach($post->comments as $comment)
                            <li class="depth-1">
                                <div class="avatar">
                                    <img width="50" height="50" class="avatar" src="{{ url('storage').'/'. $comment->user->profile_picture}}" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-info">
                                        <cite>{{ $comment->user->name }}</cite>
                                        @if(Auth::check())
                                            @if( Auth::user()->id == $comment->user_id)
                                                <form action="{{ url("posts/$post->id/comments/$comment->id") }}" method="POST">
                                                    {{ method_field("DELETE") }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger delete-button" style="float: right">X</button>
                                                </form>
                                            @endif
                                        @endif
                                        <div class="comment-meta">
                                            <time class="comment-time" datetime="2014-07-12T23:05">
                                                {{ $comment->created_at->format('F d, Y @ H:m') }}
                                            </time>
                                        </div>
                                    </div>
                                    <div class="comment-text">
                                        <p>{{ $comment->text }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>

                    @if(Auth::check())
                    <div class="respond">
                        <h3>Leave a Comment</h3>

                        <form method="POST" action="{{ url("posts/$post->id/comments") }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="message form-field">
                                    <textarea name="text" class="full-width" placeholder="Your Message" ></textarea>
                                </div>
                                <button type="submit" class="submit button-primary">Submit</button>
                            </fieldset>
                        </form> <!-- Form End -->
                    </div> <!-- Respond End -->
                    @else
                        <div class="respond">
                            <h3>Please login to comment on this post! <a href="{{ url('login') }}">Login</a></h3>
                        </div>
                    @endif

                </div> <!-- end col-full -->
            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->

    </section> <!-- end content -->
@endsection
