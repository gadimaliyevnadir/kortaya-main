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
                <li class="order_tracking_menu_list
                    @if(request()->has('type'))
                        @if(request()->get('type') == 'active')
                            active_border
                        @endif
                    @endif
                    "
                    @if(request()->has('type'))
                        @if(request()->get('type') == 'active')
                            data-border="active"
                        @else
                            data-border="failed"
                        @endif
                    @endif
                >
                    <a class="order_tracking_menu_list_link"
                       href="{{ route('frontend.orderTracking',['type'=>'active']) }}">Order History
                        <span>(0)</span></a>
                </li>
                <li class="order_tracking_menu_list
                    @if(request()->has('type'))
                        @if(request()->get('type') == 'failed')
                            active_border
                        @endif
                    @endif
                "
                    @if(request()->has('type'))
                        @if(request()->get('type') == 'failed')
                            data-border="active"
                        @else
                            data-border="failed"
                        @endif
                    @endif
                >
                    <a class="order_tracking_menu_list_link"
                       href="{{ route('frontend.orderTracking',['type'=>'failed']) }}">Cancellations / Exchanges <span>(0)</span></a>
                </li>
            </ul>
            @if(request()->has('type'))
                @if(request()->get('type') == 'active')
                    @include('frontend.pages.orders.sections.active_filter')
                @else
                    @include('frontend.pages.orders.sections.failed_filter')
                @endif
            @else
                @include('frontend.pages.orders.sections.active_filter')
            @endif
        </div>
    </section>
    <section class="order_history">
        <div class="container">
            <div class="order_history_content">
                <div class="order_history_box">
                    @if(request()->has('type'))
                        @if(request()->get('type') == 'active')
                            @include('frontend.pages.orders.sections.active_body')
                        @else
                            @include('frontend.pages.orders.sections.failed_body')
                        @endif
                    @else
                        @include('frontend.pages.orders.sections.active_body')
                    @endif
                </div>
                {{--            @include('frontend.pages.orders.paginate')--}}
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{asset('main/order.js')}}"></script>
@endsection
