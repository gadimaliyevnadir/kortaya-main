@include('frontend.menuBottomMenu')
<footer class="section footer-section">
    <div class="footer-top section-padding pb-40">
        <div class="container">
            <div class="row mb-n10 justify-content-between flex-wrap">
                <div class="col-12 col-sm-6 col-lg-3 col-xl-3 mb-3 mb-md-10 mb-40" data-aos="fade-up" data-aos-delay="200">
                    <div class="single-footer-widget">
                        <a href="{{route('frontend.dashboard')}}">
                        <img class="single-footer-widget-img"
                            src="{{asset('frontend/assets/images/kortayaLogo/korteya_logo.svg')}}"
                            alt="Site footer Logo" />
                        </a>
                        <!-- <p class="desc-content">{{settings('contact_us_text')}}</p> -->
                        <ul class="widget-address">
                            <li><span>Address: </span>{{settings('location')}}</li>
                            <li><span>Call to: </span> <a href="#"> {{settings('phone')}}</a></li>
                            <li><span>Mail to: </span> <a href="#"> {{settings('email')}}</a></li>
                        </ul>
                        <!-- <div class="widget-social justify-content-start mt-4">
                            <a title="Facebook" href="{{settings('facebook')}}"><i class="fa fa-facebook-f"></i></a>
                            <a title="Twitter" href="{{settings('twitter')}}"><i class="fa fa-twitter"></i></a>
                            <a title="Linkedin" href="{{settings('linkedin')}}"><i class="fa fa-linkedin"></i></a>
                            <a title="Youtube" href="{{settings('youtube')}}"><i class="fa fa-youtube"></i></a>
                            <a title="Vimeo" href="{{settings('vimeo')}}"><i class="fa fa-vimeo"></i></a>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="col-12 col-sm-6 col-lg-2 col-xl-2 mb-3 mb-md-10" data-aos="fade-up" data-aos-delay="300">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Information</h2>
                        <ul class="widget-list">
                            <li><a href="{{route('frontend.about')}}">About Us</a></li>
                            <li><a href="{{route('frontend.contact')}}"> <span>Contact</span></a></li>
                            {{-- <li><a href="about.html">Delivery Information</a></li>--}}
                            {{-- <li><a href="about.html">Privacy Policy</a></li>--}}
                            {{-- <li><a href="about.html">Terms & Conditions</a></li>--}}
                            {{-- <li><a href="about.html">Customer Service</a></li>--}}
                            {{-- <li><a href="about.html">Return Policy</a></li>--}}
                            {{-- <li><a href="checkout.html">Checkout</a></li>--}}
                        </ul>
                    </div>
                </div> -->
                <!-- <div class="col-12 col-sm-6 col-lg-2 col-xl-2 mb-3 mb-md-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="single-footer-widget aos-init aos-animate">
                        <h2 class="widget-title">Korteya News</h2>
                        <ul class="widget-list">
                            <li><a href="{{route('frontend.blogs')}}">Blog</a></li>
                        </ul>
                        @if(auth()->check())
                        <ul class="widget-list">
                            <li><a href="{{route('frontend.profile')}}">My Account</a></li>
                            <li><a href="{{route('frontend.wishlist')}}">Wishlist</a></li>
                            <li><a href="{{route('frontend.cart')}}">Cart</a></li>
                            <li><a href="{{route('frontend.loginForm')}}">Loging</a></li>
                            <li><a href="{{route('frontend.register.form')}}">Register</a></li>
                        </ul>
                        @endif
                    </div>
                </div> -->
                <!-- <div class="col-12 col-sm-6 col-lg-2 col-xl-2 mb-3 mb-md-10" data-aos="fade-up" data-aos-delay="500">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Newsletter</h2>
                        <div class="widget-body">
                            <p class="desc-content mb-0">Get E-mail updates about our latest shop and special
                                offers.</p>
                            <div class="newsletter-form-wrap pt-4">
                                <input type="email" class="form-control ps-0 email-box mb-4 email_subscribe"
                                    placeholder="Enter your email here.." name="email_subscribe">
                                <a class="newsletter-btn btn btn-primary btn-hover-dark subscribe_form_btn"
                                    data-url="{{route('frontend.subscribeSendRequest')}}" type="submit">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-12 col-sm-6 col-lg-3 col-xl-3 pb-0 pb-md-10 pb-md-0 mb-5 mb-md-10" data-aos="fade-up" data-aos-delay="200">
                    <div class="single-footer-widget">
                        <!-- <h2 class="widget-title">Contact Us</h2> -->
                        <!-- <ul class="widget-address">
                            <li><span>Address: </span>{{settings('location')}}</li>
                            <li><span>Call to: </span> <a href="#"> {{settings('phone')}}</a></li>
                            <li><span>Mail to: </span> <a href="#"> {{settings('email')}}</a></li>
                        </ul> -->

                        <div class="widget-social justify-content-start justify-content-md-end mt-4 d-flex">
                            <!-- <a title="Facebook" href="{{settings('facebook')}}"><i class="fa fa-facebook-f"></i></a>
                            <a title="Twitter" href="{{settings('twitter')}}"><i class="fa fa-twitter"></i></a>
                            <a title="Linkedin" href="{{settings('linkedin')}}"><i class="fa fa-linkedin"></i></a>
                            <a title="Youtube" href="{{settings('youtube')}}"><i class="fa fa-youtube"></i></a>
                            <a title="Vimeo" href="{{settings('vimeo')}}"><i class="fa fa-vimeo"></i></a> -->
                            <a title="Linkedin" href="{{settings('instagram')}}">
                                <!-- // instagram link -->
                                <img src="{{asset('frontend/assets/images/test/instagram.png')}}" alt="" />
                            </a>
                            <a title="Linkedin" href="{{settings('youtube')}}">
                                <img src="{{asset('frontend/assets/images/test/youtube.png')}}" alt="" />
                            </a>
                            <a title="Facebook" href="{{settings('facebook')}}">
                                <!-- tiktok link -->
                                <img src="{{asset('frontend/assets/images/test/facebook.png')}}" alt="" />
                            </a>
                            <a title="Facebook" href="{{settings('twitter')}}">
                                <img src="{{asset('frontend/assets/images/test/twitter.png')}}" alt="" />
                            </a>
                            <a title="Facebook" href="{{settings('reddit')}}">
                                <!-- reddit link -->
                                <img src="{{asset('frontend/assets/images/test/reddit.png')}}" alt="" />
                            </a>
                            <a title="Facebook" href="{{settings('pinterest')}}">
                                <!-- reddit link -->
                                <img src="{{asset('frontend/assets/images/test/pinterest.png')}}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bt_dummy">
        <div class="container">
            <div class="bt_escrow" data-aos="fade-up" data-aos-delay="300">
                <div class="bt_payment">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231113/visa%20(1).png" class="bt_VISA"
                        alt="VISA">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231113/paypal%20(1).png"
                        class="bt_paypal" alt="paypal">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231113/amex%20(1).png" class="bt_amex"
                        alt="AMEX">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231113/card%20(1).png" class="bt_master"
                        alt="mastercard">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231113/jcb%20(1).png" class="bt_JCB"
                        alt="JCB">
                </div>
                <div class="bt_shipping" data-aos="fade-up" data-aos-delay="400">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231113/EMS_Logo_RGB.png" class="bt_EMS"
                        alt="EMS">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231113/dhl.jpg" class="bt_DHL" alt="DHL">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231016/aramex.png" class="bt_aramex"
                        alt="aramex">
                    <img src="https://annecy1.cafe24.com/web/upload/NNEditor/20230605/rincos.png" class="bt_rincos"
                        alt="rincos">
                </div>
            </div>

            <p class="mt-20 copyright_text">Copyright © KORTEYA. All Rights Reserved.</p>
        </div>
        <!-- //bt_escrow -->
    </div>

    <!-- <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="copyright-content">
                        <p class="mb-0">© 2021 <strong>Destry </strong> Made width <i
                                class="fa fa-heart text-danger"></i> by <a href="https://hasthemes.com/">HasThemes.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</footer>

<div id="right_quick">
    <div class="contactInfo">
        <div class="contactInfo-icon" id="contactInfo-icon-id">
            <a><img style="padding:3px;" class="open"
                    src="https://annecy1.cafe24.com/web/upload/NNEditor/20240124/free-animated-icon-tech-support-6416402.gif"
                    alt="Tech Support Icon"><img style="padding:-1px; display : none;" class="close"
                    src="https://annecy1.cafe24.com/web/upload/NNEditor/20240207/%EC%83%81%EB%8B%B4%20%ED%81%B4%EB%A1%9C%EC%A6%88_%EB%8C%80%EC%A7%80%201.jpg"
                    alt="close Tech Support Icon"></a>
        </div>
        <div class="contactInfo-content" id="contactContent" data-visible="false" style="display: none;">
            <div class="support-time">
                <div class="support-img">
                    <img
                        src="https://annecy1.cafe24.com/web/upload/NNEditor/20240124/%ED%83%9C%EA%B7%B9%EA%B8%B0%2B%EB%AC%B4%EA%B6%81%ED%99%94.png">
                    &nbsp;
                </div>
                <div class="text-content">
                    <div class="suptime">
                        {!! settings('opening_hours_and_chat') !!}
                    </div>
                    <div>
                        <a class="RW">Time&nbsp;</a>
                        <a id="kortime">THU/22/02/2024 PM 04:15:28</a>
                    </div>
                </div>
            </div>
            <div class="contactBox">
                <div class="contactMail">
                    <a href="{{settings('phone')}}" id="copyEmail"><img
                            src="https://annecy1.cafe24.com/web/upload/NNEditor/20240105/free-icon-envelope-481659.png">Kortaya
                        E-MAIL</a>
                </div>
                <div class="contactWhatsApp">
                    <a href="{{settings('email')}}" target="_blank"><img
                            src="https://annecy1.cafe24.com/web/upload/NNEditor/20240105/free-icon-phone-call-4557072%20(1).png">Kortaya
                        WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
    <div class="scrollToTop">
        <a href="#none">
            <img src="{{asset('frontend/assets/images/fixedbuttons/r_quick_top.svg')}}">
        </a>
    </div>
    <div class="scrollToEnd">
        <a href="#none">
            <img src="{{asset('frontend/assets/images/fixedbuttons/r_quick_bottom.svg')}}">
        </a>
    </div>
</div>

<!-- <div class="coupon-icon-wrap">
    <a df-banner-clone="" href="#">
        <img class="first_img" src="{{asset('frontend/assets/images/test/salesfree.png')}}" alt="test" />
    </a>
    <span class="close-button" onclick="closeCouponBox()"><img src="https://annecy1.cafe24.com/web/upload/NNEditor/20231219/free-icon-close-window-658312237.png"></span>
</div> -->
@include('frontend.pages.products.modal.modal-product')
