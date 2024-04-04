@extends('frontend.layouts.master')
@section('header')
@include('frontend.includes.header')
@endsection
@section('content')
<div class="profile-bg">
    <div class="container py-5">
        <section class="order_tracking_path">
            <div class="container order_tracking_box">
                <a class="banner_path_links" href="#">
                    Home
                </a>
                <a class="banner_path_links" href="#">
                    My Account
                </a>
            </div>
        </section>

        <div class="profile_head_new d-flex align-items-center justify-content-center py-5">
            <div class="profile_info">
                <span class="user__thumb">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231211/person.png">
                </span>
                <div class="user__info">
                    <span>
                        <span class="txtEm1">{{auth()->user()->first_name }} {{auth()->user()->last_name }}</span>
                        <a class="group_name RW">
                            (
                            <span class="xans-member-var-group_name">WELCOME</span>
                            <span class="myshop_benefit_ship_free_message"></span>
                            )
                        </a>
                    </span>
                    <a class="user__info__link" href="">profile</a>
                </div>
            </div>
            <div class="my_coupons">
                <a class="my_coupons_link" href="">
                    <span class="thumb"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"
                            viewBox="0 0 32 32" class="icon" role="img">
                            <path
                                d="M16.0001 29.3334C23.3639 29.3334 29.3334 23.3639 29.3334 16.0001C29.3334 8.63628 23.3639 2.66675 16.0001 2.66675C8.63628 2.66675 2.66675 8.63628 2.66675 16.0001C2.66675 23.3639 8.63628 29.3334 16.0001 29.3334Z"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                                d="M13.5469 13.5469C14.1406 12.9844 14.1406 12.0156 13.5469 11.4531C12.9844 10.8594 12.0156 10.8594 11.4531 11.4531C10.8594 12.0156 10.8594 12.9844 11.4531 13.5469C12.0156 14.1406 12.9844 14.1406 13.5469 13.5469ZM18.4531 18.4531C17.8594 19.0156 17.8594 19.9844 18.4531 20.5469C19.0156 21.1406 19.9844 21.1406 20.5469 20.5469C21.1406 19.9844 21.1406 19.0156 20.5469 18.4531C19.9844 17.8594 19.0156 17.8594 18.4531 18.4531ZM20.8594 11.8594L20.1406 11.1406C19.9531 10.9531 19.6406 10.9531 19.4531 11.1406L11.1406 19.4531C10.9531 19.6406 10.9531 19.9531 11.1406 20.1406L11.8594 20.8594C12.0469 21.0469 12.3594 21.0469 12.5469 20.8594L20.8594 12.5469C21.0469 12.3594 21.0469 12.0469 20.8594 11.8594Z"
                                fill="#1A1A1A"></path>
                        </svg></span>
                    <span class="data"><span id="xans_myshop_bankbook_coupon_cnt">0</span></span>
                    <span class="title">My Coupons</span>
                </a>
            </div>
            <div class="my_coupons">
                <a class="my_coupons_link" href="">
                    <span class="thumb">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32"
                            class="icon" role="img">
                            <path d="M22 12.5333L10 5.61328" stroke="black" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M28 21.3334V10.6667C27.9995 10.1991 27.8761 9.73978 27.6421 9.33492C27.408 8.93005 27.0717 8.59385 26.6667 8.36003L17.3333 3.0267C16.9279 2.79265 16.4681 2.66943 16 2.66943C15.5319 2.66943 15.0721 2.79265 14.6667 3.0267L5.33333 8.36003C4.92835 8.59385 4.59197 8.93005 4.35795 9.33492C4.12392 9.73978 4.00048 10.1991 4 10.6667V21.3334C4.00048 21.801 4.12392 22.2603 4.35795 22.6651C4.59197 23.07 4.92835 23.4062 5.33333 23.64L14.6667 28.9734C15.0721 29.2074 15.5319 29.3306 16 29.3306C16.4681 29.3306 16.9279 29.2074 17.3333 28.9734L26.6667 23.64C27.0717 23.4062 27.408 23.07 27.6421 22.6651C27.8761 22.2603 27.9995 21.801 28 21.3334Z"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M4.35986 9.28003L15.9999 16.0134L27.6399 9.28003" stroke="black" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M16 29.44V16" stroke="black" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    <span class="data">${{auth()->user()->orders->sum('total_amount')}}({{auth()->user()->orders->count()}} orders)</span>
                    <span class="title">My Orders</span>
                </a>
            </div>
        </div>
        <div class="profile_actions_details mt-5">
            <ul class="state__order">
                <li>
                    <a href="#" class="count">
                        <span id="xans_myshop_orderstate_shppied_before_count"
                        >{{auth()->user()->orders->where('order_status_id',\App\Enums\OrderType::AWAITING_PAYMENT)->count()}}</span></a>
                    <span class="label">Awaiting Payment</span>
                </li>
                <li>
                    <a href="#" class="count">
                        <span id="xans_myshop_orderstate_shppied_standby_count"
                        >{{auth()->user()->orders->where('order_status_id',\App\Enums\OrderType::PREPARING_SHIPMENT)->count()}}</span></a>
                    <span class="label">Preparing Shipment</span>
                </li>
                <li>
                    <a href="#" class="count">
                        <span id="xans_myshop_orderstate_shppied_begin_count"
                        >{{auth()->user()->orders->where('order_status_id',\App\Enums\OrderType::IN_TRANSIT)->count()}}</span></a>
                    <span class="label">In Transit</span>
                </li>
                <li>
                    <a href="#" class="count"><span id="xans_myshop_orderstate_shppied_complate_count"
                        >{{auth()->user()->orders->where('order_status_id',\App\Enums\OrderType::DELIVERED)->count()}}</span></a>
                    <span class="label">Delivered</span>
                </li>
            </ul>
        </div>
        <div class="profile_menu">
            <ul class="menu_special">
                <li>
                    <a href="{{route('frontend.orderTracking')}}">📦 ORDER HISTORY</a>
                </li>
                <li class="">
                    <a href="{{route('frontend.couponew')}}">🎫 COUPONS</a>
                </li>
                <li>
                    <a href="{{route('frontend.profile.addresses')}}">📖 ADDRESS BOOK</a>
                </li>
                <li>
                    <a href="{{route('frontend.recentView')}}">🕒 RECENT VIEW</a>
                </li>
                <li>
                    <a href="{{route('frontend.wishlist')}}">💝 MY WISHLIST <span
                            class="wishList-count myShop-count">0</span></a>
                </li>
            </ul>
            <ul class="menu_special">
                <li>
                    <a href="{{route('frontend.cart')}}">🛒 MY CART <span class="cart-count myShop-count">0</span></a>
                </li>
                <li class="">
                    <a href="">📝 MY POST <span class="myPost-count myShop-count">0</span></a>
                </li>
                <li class="">
                    <a href="{{route('frontend.profile.edit')}}">Edit Profile</a>
                </li>
                <li class="">
                    <a href="{{route('frontend.logout')}}">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{--<script src="{{asset('main/auth/profile.js')}}"></script>--}}
@endsection
