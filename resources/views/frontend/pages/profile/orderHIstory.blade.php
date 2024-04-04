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
        <ul class="order_tracking_menu">
            <li class="order_tracking_menu_list active_border" data-border="active">
                <a class="order_tracking_menu_list_link" href="#">Order History <span>(0)</span></a>
            </li>
            <li class="order_tracking_menu_list" data-border="failed">
                <a class="order_tracking_menu_list_link" href="#">Cancellations / Exchanges <span>(0)</span></a>
            </li>
        </ul>
        <div class="order_tracking_date_box" data-assign="active">
            <div class="order_tracking_date_box_div">
                <select name="orderTrackingSelect" id="ordertrackingselect">
                    <option value="0">Test1</option>
                    <option value="0">Test2</option>
                    <option value="0">Test3</option>
                    <option value="0">Test4</option>
                </select>
                <ul class="order_tracking_time_duration">
                    <li class="order_tracking_time_duration_item">
                        <a class="order_tracking_time_duration_link" href="#">
                            Today
                        </a>
                    </li>
                    <li class="order_tracking_time_duration_item">
                        <a class="order_tracking_time_duration_link" href="#">
                            1 Month
                        </a>
                    </li>
                    <li class="order_tracking_time_duration_item">
                        <a class="order_tracking_time_duration_link" href="#">
                            3 Month
                        </a>
                    </li>
                    <li class="order_tracking_time_duration_item">
                        <a class="order_tracking_time_duration_link" href="#">
                            6 Month
                        </a>
                    </li>
                </ul>
                <div class="order_tracking_date">
                    <div class="order_tracking_date_item">
                        <input type="text" id="simple" class="order_tracking_date_class" />
                        <label for="simple">
                            <img src="{{asset('frontend/assets/images/order_tracking/calendar-icon.svg')}}"
                                alt="calendar" />
                        </label>
                    </div>
                    <span class="extension_date">
                        ~
                    </span>
                    <div class="order_tracking_date_item">
                        <input type="text" id="simple2" class="order_tracking_date_class">
                        <label for="simple2">
                            <img src="{{asset('frontend/assets/images/order_tracking/calendar-icon.svg')}}"
                                alt="calendar" />
                        </label>
                    </div>
                </div>
                <button class="order_tracking_btn go_filter_btn" data-url="{{route('frontend.orderTracking')}}">
                    <a href="#">Go</a>
                </button>
            </div>
            <ul class="order_tracking_date_info">
                <li class="order_tracking_date_info_item">
                    By default, results are shown for the past three months. You can also view the order history of
                    orders that have been fulfilled over the past 36 months by adjusting the date range.
                </li>
                <li class="order_tracking_date_info_item">
                    You can check order history of orders that have been fulfilled over 36 months ago in <a
                        href="#">[Archived
                        Orders]</a> tab.
                </li>
            </ul>
        </div>
        <div class="order_tracking_date_box" data-assign="failed">
            <div class="order_tracking_date_box_div">
                <ul class="order_tracking_time_duration">
                    <li class="order_tracking_time_duration_item">
                        <a class="order_tracking_time_duration_link" href="#">
                            Today
                        </a>
                    </li>
                    <li class="order_tracking_time_duration_item">
                        <a class="order_tracking_time_duration_link" href="#">
                            1 Month
                        </a>
                    </li>
                    <li class="order_tracking_time_duration_item">
                        <a class="order_tracking_time_duration_link" href="#">
                            3 Month
                        </a>
                    </li>
                    <li class="order_tracking_time_duration_item">
                        <a class="order_tracking_time_duration_link" href="#">
                            6 Month
                        </a>
                    </li>
                </ul>
                <div class="order_tracking_date">
                    <div class="order_tracking_date_item">
                        <input type="text" id="simple" class="order_tracking_date_class" />
                        <label for="simple">
                            <img src="{{asset('frontend/assets/images/order_tracking/calendar-icon.svg')}}"
                                alt="calendar" />
                        </label>
                    </div>
                    <span class="extension_date">
                        ~
                    </span>
                    <div class="order_tracking_date_item">
                        <input type="text" id="simple2" class="order_tracking_date_class">
                        <label for="simple2">
                            <img src="{{asset('frontend/assets/images/order_tracking/calendar-icon.svg')}}"
                                alt="calendar" />
                        </label>
                    </div>
                </div>
                <button class="order_tracking_btn go_filter_btn" data-url="{{route('frontend.orderTracking')}}">
                    <a href="#">Go</a>
                </button>
            </div>
            <ul class="order_tracking_date_info">
                <li class="order_tracking_date_info_item">
                    By default, results are shown for the past three months. You can also view the order history of
                    orders that have been fulfilled over the past 36 months by adjusting the date range.
                </li>
                <li class="order_tracking_date_info_item">
                    You can check order history of orders that have been fulfilled over 36 months ago in <a
                        href="#">[Archived
                        Orders]</a> tab.
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="order_history">
    <div class="container">
        <div class="order_history_content">
            <div class="order_history_box">

                <div class="container order_history_active_check" data-assign="active">

                    <div class="row">
                        <div class="col-12">
                            <!-- Cart Table Start -->
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
                    </div>
                    <!-- Asaqidaki commenteriya hecne olmayanda gorsensin -->
                    <!-- <div class="order_history_empty">
                        <img class="order_history_empty_img"
                            src="{{asset('frontend/assets/images/order_tracking/info.svg')}}" alt="history" />
                        <p class="order_history_empty_text">There is no order history.</p>
                    </div> -->

                </div>
                <div class="container order_history_active_check" data-assign="failed">

                    <div class="row">
                        <div class="col-12">
                            <!-- Cart Table Start -->
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
                    </div>
                    <!-- Asaqidaki commenteriya hecne olmayanda gorsensin -->
                    <!-- <div class="order_history_empty">
                        <img class="order_history_empty_img"
                            src="{{asset('frontend/assets/images/order_tracking/info.svg')}}" alt="history" />
                        <p class="order_history_empty_text">There is no order history.</p>
                    </div> -->

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