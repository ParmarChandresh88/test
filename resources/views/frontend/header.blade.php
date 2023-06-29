<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecommerce Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


    <!-- Modernizr JS -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href=""><img src="{{ asset('images/logo/4.png') }}"
                                            alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="{{ url('/') }}">Home</a></li>
                                        @foreach ($cate as $list)
                                            @if ($list->status == 1)
                                                <li>
                                                    <a
                                                        href="{{ url('cat_detail/' . $list->id) }}">{{ $list->category }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                        <li><a href="{{ url('contactus') }}">contact</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        @foreach ($cate as $list)
                                            @if ($list->status == 1)
                                                <li><a href="">{{ $list->category }}</a></li>
                                            @endif
                                        @endforeach
                                        <li><a href="{{ url('contactus') }}">contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            @if (session()->has('user_name', 'user_id'))
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="header__right">
                                        <div class="header__account">
                                            <a href="{{ url('logout_user') }}">Logout</a>
                                        </div>
                                        <div class="htc__shopping__cart">
                                            <a class="cart__menu"
                                                href="{{ url('v_cart/' . session()->get('user_id')) }}"><i
                                                    class="icon-handbag icons"></i></a>
                                            <a href="{{ url('v_cart/' . session()->get('user_id')) }}"><span
                                                    class="htc__qua">{{ $cartdata }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="header__right">
                                        <div class="header__account">
                                            <a href="{{ url('register') }}">Login/Register</a>
                                        </div>
                                        {{-- <div class="htc__shopping__cart">
                                            <a class="cart__menu"
                                                href="{{ url('v_cart/' . session()->get('user_id')) }}"><i
                                                    class="icon-handbag icons"></i></a>
                                            <a href="{{ url('v_cart/' . session()->get('user_id')) }}"><span
                                                    class="htc__qua">{{ $cartdata }}</span></a>
                                        </div> --}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</body>
