@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
   <div class="contents">
   <div class="section section-margin">
        <div class="container">
            <div class="row product_container">
                <div class="col-lg-5 offset-lg-0 col-12 offset-md-2 col-custom">
                    <div class="product-details-img">
                        <div class="single-product-img swiper-container gallery-top">
                            <div class="swiper-wrapper popup-gallery">
                                @foreach($product->files as $file)
                                    <a class="swiper-slide w-100" href="{{$file->document}}">
                                        <img class="w-100" src="{{$file->document}}" alt="Product">
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($product->files as $file)
                                    <div class="swiper-slide">
                                        <img src="{{$file->document}}" alt="Product">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-horizental-next  swiper-button-next"><i
                                    class="pe-7s-angle-right"></i>
                            </div>
                            <div class="swiper-button-horizental-prev swiper-button-prev"><i
                                    class="pe-7s-angle-left"></i>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-5 col-custom">

                    <div class="product-summery position-relative">
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{$product->name}} {{$product->id}}</h2>
                        </div>
                        <div class="price-box mb-2">
                            <span class="regular-price">{{$product->discount_price}}</span>
                            <span class="old-price"><del>{{$product->price}}</del></span>
                        </div>
                        <div class="mt-0 mb-2 expiration_date">
                            <p>Expiration date <span>2026-04-16</span></p>
                        </div>
                        <span class="ratings justify-content-start">
                        <span class="rating-wrap">
                            <span class="star" style="width: {{$product->rate()}}%"></span>
                        </span>
                    </span>
                        <div class="sku mb-3">
                        </div>

                        <p class="desc-content mb-5">{{translation($product)->title}}</p>
                        @if(auth()->check())
                            <div class="quantity mb-5">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box"
                                           data-url="{{route('frontend.incrementDecrementBasketTwo',['product'=>$product->id])}}"
                                           data-combination="{{$product->main()->pivot->id}}"
                                           value="{{$qty_product}}">
                                    <div class="dec qtybutton"></div>
                                    <div class="inc qtybutton"></div>
                                </div>
                            </div>
                        @else
                            <div class="quantity mb-5">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box"
                                           data-url="{{route('frontend.incrementDecrementBasketTwo',['product'=>$product->id])}}"
                                           data-combination="{{$product->main()->pivot->id}}"
                                           value="{{$qty_product}}"
                                           type="text">
                                    <div class="dec qtybutton"></div>
                                    <div class="inc qtybutton"></div>
                                </div>
                            </div>
                        @endif

                        <div class="cart-wishlist-btn mb-4">
                            <div class="buy">
                                <a class="btn btn-hover-primary shipping_modal">Buy now</a>
                            </div>
                            <div class="add-to_cart">
                                <a class="btn btn-outline-dark btn-hover-primary add_basket_btn"
                                   data-url="{{route('frontend.addBasket',['product'=>$product])}}"
                                   data-combination="{{$product->main()->pivot->id}}">Add to cart</a>
                            </div>
                            <div class="add-to-wishlist">
                                <a class="btn btn-outline-dark btn-hover-primary like_btn"
                                   data-url="{{route('frontend.like',['product'=>$product])}}" href="">Add to
                                    Wishlist</a>
                            </div>
                        </div>

                        <div class="social-share">
                            <span>Share :</span>
                            <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                            <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                            <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                            <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                        </div>
                        <ul class="product-delivery-policy border-top pt-4 mt-4 border-bottom pb-4">
                            <li><i class="fa fa-check-square"></i> <span>Security Policy (Edit With Customer Reassurance
                                Module)</span>
                            </li>
                            <li>
                                <i class="fa fa-truck"></i><span>Delivery Policy (Edit With Customer Reassurance
                                Module)</span>
                            </li>
                            <li>
                                <i class="fa fa-refresh"></i><span>Return Policy (Edit With Customer Reassurance
                                Module)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @include('frontend.pages.products.sections.margin')
            @include('frontend.pages.products.sections.details_describtion')
            @include('frontend.pages.products.sections.similar')
        </div>
    </div>
   </div>
@endsection
@section('scripts')
    <script src="{{asset('main/review.js')}}"></script>
@endsection
