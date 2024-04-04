@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.breadcrumb_content',['title'=>'My Account'])
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="myaccount-page-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-bs-toggle="tab"><i
                                            class="fa fa-dashboard"></i>
                                        Dashboard</a>
                                    <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

                                    <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                        Details</a>
                                    <a href="{{route('frontend.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hello, <strong>Alex Aya</strong> (If Not <strong>Aya !</strong><a
                                                        href="login-register.html" class="logout"> Logout</a>)</p>
                                            </div>
                                            <p class="mb-0">From your account dashboard. you can easily check & view
                                                your recent orders, manage your shipping and billing addresses and edit
                                                your password and account details.</p>
                                        </div>
                                    </div>
                                    @include('frontend.pages.profile.sections.orders')
                                    @include('frontend.pages.profile.sections.address')
                                    @include('frontend.pages.profile.sections.account_info')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('main/auth/profile.js')}}"></script>
@endsection
