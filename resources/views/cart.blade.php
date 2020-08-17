@extends('user.layouts.home')

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Cart</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="cart.html">Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<!--================Cart Area =================-->

<section class="cart_area">
    <div class="container">
        @if(Cart::count() > 0)
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartData as $key => $cart)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset($cart->model->image)}}" alt="" width="100px" />
                                    </div>
                                    <div class="media-body">
                                        <p>{{$cart->model->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>IDR.{{$cart->model->price}}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="qty" id="sst" maxlength="12" value="{{$cart->qty}}" title="Quantity:" class="input-text qty" />
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                                        <i class="lnr lnr-chevron-up"></i>
                                    </button>
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                                        <i class="lnr lnr-chevron-down"></i>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <h5>{{$cart->qty * $cart->model->price}}</h5>
                            </td>
                            <td>
                                <form method="POST" action="{{route('cart.destroy',$cart->rowId)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="bottom_button">
                            <td>
                                <a class="gray_btn" href="#">Update Cart</a>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="cupon_text">
                                    <input type="text" placeholder="Coupon Code" />
                                    <a class="main_btn" href="#">Apply</a>
                                    <a class="gray_btn" href="#">Close Coupon</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>{{Cart::subtotal()}}</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner">
                                    <a class="gray_btn" href="#">Continue Shopping</a>
                                    <a class="main_btn" href="#">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div>
            <h1>Tidak Ada Product di cart</h1>
        </div>
        @endif
    </div>
</section>
<!--================End Cart Area =================-->


@endsection