@extends('layouts.app')

@section('styles')

@endsection
<style>
    .pagination {
        margin: 3rem auto;
        text-align: center;
    }

    .pagination ul li {
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    .pagination .page-item {
        font-family: "montserrat-bold", sans-serif;
        font-size: 15px;
        line-height: 24px;
        display: inline-block;
        padding: 6px 12px;
        height: 36px;
        margin-right: 6px;
        margin-bottom: 9px;
        color: #2b2b2b;
        background-color: #dbdbdb;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .pagination .page-item:hover {
        background: #000000;
        color: white;
    }

    .pagination .current,
    .pagination .current:hover {
        background-color: #000000;
        color: white;
    }

    .pagination .inactive,
    .pagination .inactive:hover {
        background-color: #DBDBDB;
        color: #919191;
    }
</style>
@section('content')
<section id="bricks">
    <div class="row masonry">

        <!-- brick-wrapper -->
        <div class="bricks-wrapper">

            <div class="grid-sizer"></div>

            <div class="brick entry featured-grid animate-this">
                <div class="entry-content">
                    <div id="featured-post-slider" class="flexslider">
                        <ul class="slides">

                            <li>
                                <div class="featured-post-slide">

                                    <div class="post-background" style="background-image:url('images/thumbs/featured/featured-1.jpg');"></div>

                                    <div class="overlay"></div>

                                    <div class="post-content">
                                        <ul class="entry-meta">
                                            <li>September 06, 2016</li>
                                            <li><a href="#" >Naruto Uzumaki</a></li>
                                        </ul>

                                        <h1 class="slide-title"><a href="single-standard.html" title="">Minimalism Never Goes Out of Style</a></h1>
                                    </div>

                                </div>
                            </li> <!-- /slide -->

                            <li>
                                <div class="featured-post-slide">

                                    <div class="post-background" style="background-image:url('images/thumbs/featured/featured-2.jpg');"></div>

                                    <div class="overlay"></div>

                                    <div class="post-content">
                                        <ul class="entry-meta">
                                            <li>August 29, 2016</li>
                                            <li><a href="#">Sasuke Uchiha</a></li>
                                        </ul>

                                        <h1 class="slide-title"><a href="single-standard.html" title="">Enhancing Your Designs with Negative Space</a></h1>
                                    </div>

                                </div>
                            </li> <!-- /slide -->

                            <li>
                                <div class="featured-post-slide">

                                    <div class="post-background" style="background-image:url('images/thumbs/featured/featured-3.jpg');;"></div>

                                    <div class="overlay"></div>

                                    <div class="post-content">
                                        <ul class="entry-meta">
                                            <li>August 27, 2016</li>
                                            <li><a href="#" class="author">Naruto Uzumaki</a></li>
                                        </ul>

                                        <h1 class="slide-title">
                                            <a href="single-standard.html" title="">Music Album Cover Designs for Inspiration</a></h1>
                                    </div>

                                </div>
                            </li> <!-- end slide -->

                        </ul> <!-- end slides -->
                    </div> <!-- end featured-post-slider -->
                </div> <!-- end entry content -->
            </div>
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

        </div> <!-- end brick-wrapper -->

    </div> <!-- end row -->

    <div class="row">

        {{ $posts->links() }}

        {{--<nav class="pagination">--}}
            {{--<span class="page-numbers prev inactive">Prev</span>--}}
            {{--<span class="page-numbers current">1</span>--}}
            {{--<a href="#" class="page-numbers">2</a>--}}
            {{--<a href="#" class="page-numbers">3</a>--}}
            {{--<a href="#" class="page-numbers">4</a>--}}
            {{--<a href="#" class="page-numbers">5</a>--}}
            {{--<a href="#" class="page-numbers">6</a>--}}
            {{--<a href="#" class="page-numbers">7</a>--}}
            {{--<a href="#" class="page-numbers">8</a>--}}
            {{--<a href="#" class="page-numbers">9</a>--}}
            {{--<a href="#" class="page-numbers next">Next</a>--}}
        {{--</nav>--}}

    </div>

</section> <!-- end bricks -->

@endsection