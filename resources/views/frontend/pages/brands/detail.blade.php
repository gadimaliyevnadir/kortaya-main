@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    <section class="brand_banner">
        <div class="container brand_banner_box">
            <div class="banner_path">
                <a class="banner_path_links" href="#">
                    Home
                </a>
                <a class="banner_path_links" href="#">
                    BRAND
                </a>
                <a class="banner_path_links" href="#">
                    {{$brand->name}}
                </a>
            </div>
            <div class="banner_img_box">
                <img src=" {{$brand->first_from_images}}" alt="Banner img" />
            </div>
        </div>
    </section>
    <section class="logo_slider">
        <div class="container">
            <div id="detail_logo" class="detail_logo">
                <img class="detail_logo_img" src="{{asset('frontend/assets/images/bannerDetail/brand_detail_logo.png')}}"
                     alt="Detail Logo" />
            </div>
            <div class="logo_slider_swiper">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide logo_slider_swiper_slide">
                            <img src="{{asset('frontend/assets/images/bannerDetail/fade_slider1.jpg')}}"
                                 alt="fade_slider1" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('frontend/assets/images/bannerDetail/fade_slider2.jpg')}}"
                                 alt="fade_slider2" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('frontend/assets/images/bannerDetail/fade_sldier3.jpg')}}"
                                 alt="fade_slider3" />
                        </div>
                    </div>
                </div>
                <div class="close_swiper"><i class="pe-7s-close"></i></div>
            </div>
        </div>
    </section>
    @include('frontend.pages.brands.detail_content')
@endsection

