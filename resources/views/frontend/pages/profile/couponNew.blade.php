@extends('frontend.layouts.master')
@section('header')
@include('frontend.includes.header')
@endsection
@section('content')
<section class="order_tracking_path">
    <div class="container order_tracking_box">
        <a class="banner_path_links" href="#">
            Home
        </a>
        <a class="banner_path_links" href="#">
            Order Tracking
        </a>
    </div>
</section>
<section class="order_tracking_content">
    <div class="container">
        <h3 class="order_tracking_content_title">Order History</h3>
        <div class="order_tracking_date_box">
            <div class="coupon_list_box">
                <div class="coupon_list_box_first">
                    <div class="coupon">
                        <input type="text" />
                    </div>
                    <button class="coupon_btn go_filter_btn" data-url="{{route('frontend.orderTracking')}}">
                        <a href="#">Register</a>
                    </button>
                </div>
                <div class="coupon_text">
                    <p class="coupon_text_content">We only accept the coupons issued by our shopping mall.(Enter 10 ~ 35
                        digit serial number without dashes.)</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="order_history">
    <div class="container">
        <div class="order_history_content">
            <div class="order_history_box">
                <div class="container order_history_active_check">
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Company name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th class="pro-quantity">Address</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="basket_content_body">
                                            <td>Name</td>
                                            <td>Status</td>
                                            <td> Created Date</td>
                                            <td> Adress Name</td>
                                            <td class="pro-subtotal"><span>$Total Amount</span></td>
                                            <td class="pro-remove"><a href="#" class="delete_order_button"
                                                    data-url="#"><i
                                                        class="pe-7s-trash"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <!-- Asaqidaki commenteriya hecne olmayanda gorsensin -->
                    <div class="order_history_empty">
                        <img class="order_history_empty_img"
                            src="{{asset('frontend/assets/images/order_tracking/info.svg')}}" alt="history" />
                        <p class="order_history_empty_text">There is no order history.</p>
                    </div>
                </div>
            </div>
            {{-- <div class="row mb-5">--}}
                {{-- <div class="col" data-aos="fade-up" data-aos-delay="300">--}}
                    {{-- <nav class="mt-8 pt-8 border-top d-flex justify-content-center">--}}
                        {{-- <ul class="pagination">--}}
                            {{-- <li class="page-item disabled">--}}
                                {{-- <a class="page-link" href="#" aria-label="Previous">--}}
                                    {{-- <span aria-hidden="true">«</span>--}}
                                    {{-- </a>--}}
                                {{-- </li>--}}
                            {{-- <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
                            {{-- <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                            {{-- <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                            {{-- <li class="page-item">--}}
                                {{-- <a class="page-link" href="#" aria-label="Next">--}}
                                    {{-- <span aria-hidden="true">»</span>--}}
                                    {{-- </a>--}}
                                {{-- </li>--}}
                            {{-- </ul>--}}
                        {{-- </nav>--}}
                    {{-- </div>--}}
                {{-- </div>--}}
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('main/auth/profile.js')}}"></script>
@endsection