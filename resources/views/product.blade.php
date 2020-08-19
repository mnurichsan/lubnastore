@extends('user.layouts.home')

@section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Product Details</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="single-product.html">Product Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <img class="img-fluid w-100" src="{{asset($detailProduct->image)}}" alt="First slide" />
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 mb-5">
                <div class="s_product_text">
                    <h3>{{$detailProduct->name}}</h3>
                    <h2>IDR.{{number_format($detailProduct->price,0,',','.')}}</h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                <span>Category</span> : {{$detailProduct->category->name}}</a>
                        </li>
                        <li>
                            <a href="#"> <span>Availibility</span> : In Stock</a>
                        </li>
                    </ul>
                    <!-- description -->
                    {!! $detailProduct->description !!}
                    <form method="POST" action="{{route('cart.store')}}">
                        @csrf
                        <div class="product_count">
                            <input type="hidden" name="id" value="{{$detailProduct->id}}">
                            <input type="hidden" name="name" value="{{$detailProduct->name}}">
                            <input type="hidden" name="price" value="{{$detailProduct->price}}">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty" />
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                                <i class="lnr lnr-chevron-down"></i>
                            </button>
                        </div>
                        <div class="card_area">
                            <button type="submit" class="main_btn">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection