@extends('user.layouts.home')

@section('content')
<!--================Home Banner Area =================-->
<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="col-lg-12">
                    <p class="sub text-uppercase">men Collection</p>
                    <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
                    <h4>Fowl saw dry which a above together place.</h4>
                    <a class="main_btn mt-40" href="#">View Collection</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!-- Start feature Area -->
<section class="feature-area section_gap_bottom_custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-money"></i>
                        <h3>Money back gurantee</h3>
                    </a>
                    <p>Shall open divide a one</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-truck"></i>
                        <h3>Free Delivery</h3>
                    </a>
                    <p>Shall open divide a one</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-support"></i>
                        <h3>Alway support</h3>
                    </a>
                    <p>Shall open divide a one</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-blockchain"></i>
                        <h3>Secure payment</h3>
                    </a>
                    <p>Shall open divide a one</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feature Area -->

<!--================ Offer Area =================-->
<section class="offer_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="offset-lg-4 col-lg-6 text-center">
                <div class="offer_content">
                    <h3 class="text-uppercase mb-40">all men’s collection</h3>
                    <h2 class="text-uppercase">50% off</h2>
                    <a href="#" class="main_btn mb-20 mt-5">Discover Now</a>
                    <p>Limited Time Offer</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Offer Area =================-->


<!--================ Inspired Product Area =================-->
<section class="inspired_product_area section_gap_bottom_custom mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>products</span></h2>
                    <p>Bring called seed first of third give itself now ment</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-6">
                <div class="single-product">

                    <div class="product-img">
                        <img class="rounded" src="{{asset($product->image)}}" width="300px" height="200px" alt="" />
                        <div class="p_icon">
                            <a href="{{route('product.detail',$product->slug)}}">
                                <i class="ti-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-btm">
                        <a href="{{route('product.detail',$product->slug)}}" class="d-block">
                            <h4>{{$product->name}}</h4>
                        </a>
                        <div class="mt-3">
                            <span class="mr-4">IDR.{{number_format($product->price,0,',','.')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Inspired Product Area =================-->

@endsection