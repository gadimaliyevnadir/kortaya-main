@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    <div class="section">
        <!-- <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Login</h1>
                    <ul>
                        <li>
                            <a href="">Home </a>
                        </li>
                        <li class="active"> Login</li>
                    </ul>
                </div>
            </div>
        </div> -->
    </div>

    <div class="section section-margin-top section-margin-bottom">
        <div class="container">
            <div class="row mb-n10 justify-content-center">
                <div class="col-lg-12 m-auto m-lg-0 login_container">
                    <div class="login-wrapper d-flex">

                    <div class="login_promo_container">
                        <img src="https://zezeya.com/web/upload/appfiles/ZaReJam3QiELznoZeGGkMG/8af233731ca7eba73b4796f5b4ed2ddf.jpg" alt="">
                    </div>
                    
                     <div class="d-flex flex-column w-40 login">
                        <h3 class="boxTitle">Member Sign In</h3>
                     <div class="single-input-item mb-2">
                            <input type="email" class="email" name="email" placeholder="EMAIL">
                        </div>
                        <div class="single-input-item mb-2">
                            <input type="password" class="password" name="password" placeholder="PASSWORD">
                        </div>
                        <div class="single-input-item mb-0">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-center">
                                <div class="remember-meta mb-3 d-flex justify-content-center align-items-center">
                                    <div class="custom-control custom-checkbox pl-2">
                                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                                        <label class="custom-control-label remember_me" for="rememberMe">Save ID</label>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                        <img src="{{asset('frontend/assets/images/test/ico_access.gif')}}" alt="access" />
                                        <p>Secured Login</p>
                                    </div>
                                </div>
                                <!-- <a href="#" class="forget-pwd mb-3">Forget Password?</a> -->
                            </div>
                        </div>
                        <div class="single-input-item mb-2">
                            <a href="#" class="btn sign_in_btn btn-hover-primary rounded-0 login_btn_form"
                               data-url="{{route('frontend.login')}}">Login</a>
                        </div>
                        <div class="lost-password">
                            <!-- <a href="{{route('frontend.register.form')}}">Create Account</a> -->
                        </div>
                        <div class="signin_socials">
                            {{--                        <div class="signin_socials_item">--}}
                            {{--                            <div class="signin_socials_item_left">--}}
                            {{--                                <img src="{{asset('frontend/assets/images/register_socials/fb.png')}}" alt="fb" />--}}
                            {{--                            </div>--}}
                            {{--                            <div class="signin_socials_item_right">--}}
                            {{--                                Sign In With Facebook--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            <div class="signin_socials_item">
                                <div class="signin_socials_item_left">
                                    <img src="{{asset('frontend/assets/images/register_socials/korteya_google.png')}}"
                                         alt="google"/>
                                </div>
                                <a href="{{route('frontend.google-login')}}">
                                    <div class="signin_socials_item_right">
                                        Sign In With Google
                                    </div>
                                </a>
                            </div>
                            {{--                        <div class="signin_socials_item">--}}
                            {{--                            <div class="signin_socials_item_left">--}}
                            {{--                                <img src="{{asset('frontend/assets/images/register_socials/applelogo.png')}}"--}}
                            {{--                                    alt="Apple" />--}}
                            {{--                            </div>--}}
                            {{--                            <div class="signin_socials_item_right">--}}
                            {{--                                Sign In With Apple--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                        </div>

                        <ul class="d-flex align-items-center justify-content-evenly pt-4 other_page_links_for_auth">
                            <li>
                                <a href="#">Forgot Password</a>
                            </li>
                            <li>
                            <a href="#">Sign Up</a>
                            </li>
                        </ul>
                     </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('main/auth/login.js')}}"></script>

@endsection
