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
    @include('user.layouts.header')
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