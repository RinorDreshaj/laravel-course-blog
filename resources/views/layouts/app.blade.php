<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Abstract</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @yield('styles')

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="{{ url('css/base.css') }}">
    <link rel="stylesheet" href="{{ url('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">


    <!-- script
    ================================================== -->
    <script src="{{ url('js/modernizr.js') }}"></script>
    <script src="{{ url('js/pace.min.js') }}"></script>

    <!-- favicons
     ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header class="short-header">

    <div class="gradient-block"></div>

    <div class="row header-content">

        <div class="logo">
            <a href="index.html">Author</a>
        </div>

        <nav id="main-nav-wrap">
            <ul class="main-navigation sf-menu">
                @if(Auth::check())
                <li class="@if($_SERVER['REQUEST_URI'] =="/users/posts") current @endif">
                    <a href="{{ url('/users/posts') }}" title="">Your Channel</a>
                </li>
                @endif

                <li class="@if($_SERVER['REQUEST_URI'] =="/") current @endif">
                    <a href="{{ url('/') }}" title="">Home</a>
                </li>
                <li class="has-children">
                    <a href="category.html" title="">Categories</a>
                    <ul class="sub-menu">
                        @foreach(\App\Category::all() as $category)
                            <li><a href="{{ url("posts/categories/$category->id") }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="@if(strpos($_SERVER['REQUEST_URI'],'about')) current @endif"><a href="{{ url('about') }}" title="">About</a></li>
                <li class="@if(strpos($_SERVER['REQUEST_URI'], 'contact')) current @endif"><a href="{{ url('contact') }}" title="">Contact</a></li>
            </ul>
        </nav> <!-- end main-nav-wrap -->

        <div class="search-wrap">
            <form role="search" method="get" class="search-form" action="{{ url('/search') }}">
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="name">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#" id="close-search" class="close-btn">Close</a>
        </div> <!-- end search wrap -->

        <div class="triggers">
            <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
            <a class="menu-toggle" href="#"><span>Menu</span></a>
        </div> <!-- end triggers -->

    </div>

</header> <!-- end header -->


@yield('content')


<!-- footer
================================================== -->
<footer>

    <div class="footer-main">

        <div class="row">

            <div class="col-four tab-full mob-full footer-info">

                <h4>About Our Site</h4>

                <p>
                    Lorem ipsum Ut velit dolor Ut labore id fugiat in ut fugiat nostrud qui in dolore commodo eu magna Duis cillum dolor officia esse mollit proident Excepteur exercitation nulla. Lorem ipsum In reprehenderit commodo aliqua irure labore.
                </p>

            </div> <!-- end footer-info -->

            <div class="col-two tab-1-3 mob-1-2 site-links">

                <h4>Site Links</h4>

                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>

            </div> <!-- end site-links -->

            <div class="col-two tab-1-3 mob-1-2 social-links">

                <h4>Social</h4>

                <ul>
                    <li><a href="https://twitter.com">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Dribbble</a></li>
                    <li><a href="#">Google+</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>

            </div> <!-- end social links -->

            <div class="col-four tab-1-3 mob-full footer-subscribe">

                <h4>Subscribe</h4>

                <p>Keep yourself updated. Subscribe to our newsletter.</p>

                <div class="subscribe-form">

                    <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Type &amp; press enter" required="">

                        <input type="submit" name="subscribe" >

                        <label for="mc-email" class="subscribe-message"></label>

                    </form>

                </div>

            </div> <!-- end subscribe -->

        </div> <!-- end row -->

    </div> <!-- end footer-main -->

    <div class="footer-bottom">
        <div class="row">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright Abstract 2016</span>
                    <span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>
                </div>

                <div id="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
                </div>
            </div>

        </div>
    </div> <!-- end footer-bottom -->

</footer>

<div id="preloader">
    <div id="loader"></div>
</div>

<!-- Java Script
================================================== -->
<script src="{{ url("js/jquery-2.1.3.min.js") }}"></script>
<script src="{{ url("js/plugins.js") }}"></script>
<script src="{{ url("js/jquery.appear.js") }}"></script>
<script src="{{ url("js/main.js") }}"></script>
<script>
    $(".delete-button").click(function(e) {
        var confirm_delete = confirm("Are you sure you want to delete this resource?");

        if(!confirm_delete)
        {
            e.preventDefault()
        }
    });
</script>


@yield('scripts')


</body>

</html>


{{--@if (Route::has('login'))--}}
{{--<div class="top-right links">--}}
{{--@auth--}}
{{--<a href="{{ url('/home') }}">Home</a>--}}
{{--@else--}}
{{--<a href="{{ route('login') }}">Login</a>--}}
{{--<a href="{{ route('register') }}">Register</a>--}}
{{--@endauth--}}
{{--</div>--}}
