<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Lubna Store</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('asset_user/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/vendors/linericon/style.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/vendors/lightbox/simpleLightbox.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/vendors/nice-select/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/vendors/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/vendors/jquery-ui/jquery-ui.css')}}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('asset_user/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_user/css/responsive.css')}}" />
</head>

<body>
    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light w-100">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html">
                        <img src="img/logo.png" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                        <div class="row w-100 mr-0">
                            <div class="col-lg-7 pr-0">
                                <ul class="nav navbar-nav center_nav pull-right">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{route('lubna.index')}}">Home</a>
                                    </li>
                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category</a>
                                        <ul class="dropdown-menu">
                                            @foreach($category as $value)
                                            <li class="nav-item">
                                                <a class="nav-link" href="">{{$value->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-5 pr-0">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="ti-search" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('cart.index')}}" class="icons">
                                            <i class="ti-shopping-cart"></i> @if(Cart::count() > 0 )({{Cart::count()}}) @endif
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="icons">
                                            <i class="ti-user" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="ti-heart" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--================Header Menu Area =================-->

    @yield('content')


    <!--================ start footer Area  =================-->
    @include('user.layouts.footer')
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('asset_user/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('asset_user/js/popper.js')}}"></script>
    <script src="{{asset('asset_user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset_user/js/stellar.js')}}"></script>
    <script src="{{asset('asset_user/vendors/lightbox/simpleLightbox.min.js')}}"></script>
    <script src="{{asset('asset_user/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('asset_user/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('asset_user/vendors/isotope/isotope-min.js')}}"></script>
    <script src="{{asset('asset_user/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('asset_user/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('asset_user/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('asset_user/vendors/counter-up/jquery.counterup.js')}}"></script>
    <script src="{{asset('asset_user/js/mail-script.js')}}"></script>
    <script src="{{asset('asset_user/js/theme.js')}}"></script>
</body>

</html>