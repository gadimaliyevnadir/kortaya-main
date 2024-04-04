<div id="head" class="header section">
    <div class="header-top bg-white">
        <div class="main_top_banner col-12" id="dynamicBanner">
            <div class="container">
                <div class="top_banner_text">
                    <a href="#" target="_self">Everyday promotion, Everyday at YourWebsite</a>
                    <!-- <a href="#" target="_self">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</a> -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-cols-xl-2 align-items-center w-100 h-70px">
                <div class="col d-none d-lg-flex gap-3 ">
                    <div class="new_header_item d-flex align-items-end gap-1">
                        <img src="{{asset('frontend/assets/images/new_header/packing.svg')}}" alt="" />
                        <p>Wholesale</p>
                    </div>
                    <div class="new_header_item d-flex align-items-end gap-1">
                        <img src="{{asset('frontend/assets/images/new_header/plane.svg')}}" alt="" />
                        <a href="{{route('frontend.about')}}">Shipping</a>
                    </div>
                    <div class="new_header_item d-flex align-items-end gap-1">
                        <img src="{{asset('frontend/assets/images/new_header/gift.svg')}}" alt="" />
                        <p>Benefits</p>
                    </div>
                    <div class="new_header_item d-flex align-items-end gap-1">
                        <img src="{{asset('frontend/assets/images/new_header/faq.svg')}}" alt="" />
                        <a href="{{route('frontend.faqs')}}">Faq</a>
                    </div>
                </div>
                <div class="col d-none d-lg-flex justify-content-end gap-3  header_right_top">
                    @if(!auth()->check())
                    <div class="new_header_item d-flex align-items-end gap-1">
                        <a class="header_new_link" href="{{route('frontend.register.form')}}">Sign Up</a>
                    </div>
                    <div class="new_header_item d-flex align-items-end gap-1">
                        <a class="header_new_link" href="{{route('frontend.loginForm')}}">Sign In</a>
                    </div>
                    @endif
                    <div class="new_header_item d-flex align-items-end gap-1">
                        <a class="header_new_link" href="{{route('frontend.orderTracking')}}">Order Tracking</a>
                    </div>
                    <div class="new_header_item d-flex align-items-end gap-1">
                        <a class="header_new_link" href="{{route('frontend.recentView')}}">Recent View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom d-xl-block ">
        <div id="header-sticky" class="header-sticky">
            <div class="container pad-fix">
                <div class="row align-items-center justify-content-between px-5 p-md-0 w-100 header_responsive">
                    <a href="javascript:void(0)"
                        class="header-action-btn header-action-btn-menu d-xl-none col-1 p-0">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div
                        class="col-6 col-xl-7 p-0 my-0 d-flex align-items-center justify-content-xl-end justify-content-center width-unset-own">
                        <div class="header-logo">
                            <a href="{{route('frontend.dashboard')}}">
                                <img src="{{asset('frontend/assets/images/kortayaLogo/korteya_logo.svg')}}"
                                    alt="Site Logo" />
                            </a>
                        </div>
                    </div>

                    <div class="col-4 d-none p-0 d-xl-flex justify-content-end align-items-center gap-3 responsive_fix">
                        <div class="header-actions">
                            <a href="javascript:void(0)" class="header-action-btn header-action-btn-search">
                                <i class="pe-7s-search"></i>
                            </a>
                            <a @if(auth()->check()) href="{{route('frontend.profile')}}"
                                @else href="{{route('frontend.loginForm')}}" @endif
                                class="header-action-btn d-none d-md-block">
                                <i class="pe-7s-user"></i>
                            </a>
                            <a href="{{route('frontend.wishlist')}}"
                                class="header-action-btn header-action-btn-wishlist d-none d-md-block">
                                <i class="pe-7s-like"></i>
                            </a>
                            <a href="javascript:void(0)" class="header-action-btn header-action-btn-cart">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num cart_icon">@if(auth()->check())
                                    {{auth()->user()?->cart?->infos->count() ?? 0}}
                                    @else
                                    {{count(session()->get('carts',[]))}}
                                    @endif</span>
                            </a>
                        </div>

                        <div class="header-top-lan-curr-link justify-content-end">
                            <div class="header-top-lan dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <div class="img-width-box">
                                        <img class="img-width"
                                            src="{{$langs->where('code',locale())->first()->first_image}}"
                                            alt="{{$langs->where('code',locale())->first()->name}}" />
                                    </div>
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul
                                    class="dropdown-menu dropdown-menu-right animate slideIndropdown width_new_countries">
                                    @foreach($langs as $lang)
                                    @if(locale() != $lang->code )
                                    <li class="head_lang_item">
                                        <a class="dropdown-item" data-lang="{{$lang->code}}"
                                            href="{{ route('frontend.lang.switch', $lang->code) }}">
                                            <div class="img-width-box">
                                                <img class="img-width" src="{{$lang->first_image}}"
                                                    alt="{{$lang->name}}" />
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-12 p-0 d-none d-xl-block width-unset-own">
                        <div class="main-menu position-relative">
                            <ul class="main-menu-position-relative-ul">
                                @include('frontend.includes.sections.header_brands')
                                @include('frontend.includes.sections.option_groups')
                                @include('frontend.includes.sections.header_categories')

                                <li class="has-children position-static">
                                    <a href="#">
                                        <span>SALE</span>
                                    </a>
                                    <div class="menu_upmenu">
                                        <ul class="mega-menu row">
                                            <li class="d-flex gap-3 col-3 flex-wrap">
                                                <div class="col-5">
                                                    <a href="#" class="mega-menu-title">Sale </a>
                                                    <ul class="mb-n2">
                                                        @foreach($campaigns->take(4) as $campaign)
                                                        <li>
                                                            <a href="">{{translation($campaign)->name}}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="col-9 row justify-content-end gap-1 flex-nowrap">
                                         <a href="#" class="col-4">
                                         <img class="col-4 mb-1 img-height2"
                                                    src="{{asset('frontend/assets/images/some_images/kompany_3.jpg')}}"
                                                    alt="1JPG" />
                                         </a>
                                               <a href="#" class="col-4">
                                               <img class="col-4 img-height2"
                                                    src="{{asset('frontend/assets/images/some_images/kompony_1.jpg')}}"
                                                    alt="2JPG" />
                                               </a>
                                                <a href="#" class="col-4">
                                                <img class="col-4 img-height2"
                                                    src="{{asset('frontend/assets/images/some_images/kompony_2.jpg')}}"
                                                    alt="2JPG" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children position-static">
                                    <a href="#">
                                        <span>ETC.</span>
                                    </a>
                                    <div class="menu_upmenu">

                                        <ul class="mega-menu row">
                                            <li class="d-flex gap-3 col-3 flex-wrap">
                                                <div class="col-5">
                                                    <a href="#" class="mega-menu-title">CUSTOMER </a>
                                                    <ul class="mb-n2">
                                                        <li>
                                                            <a href="">Contact Us</a>
                                                        </li>
                                                        <li>
                                                            <a href="">Delivery Guide & Precautions</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </li>
                                            <li class="col-9 row justify-content-end gap-1 flex-nowrap">
                                                @foreach($banners->where('banner_type',\App\Enums\BannerType::ETC_BANNERS)
                                                as $banner)
                                   <a href="#" class="col-4">
                                   <img class="mb-1 img-height2" src="{{$banner->first_image}}"
                                                    alt="1JPG" />
                                   </a>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-actions width-unset-own header_actions_sticky">
                        <a href="javascript:void(0)" class="header-action-btn header-action-btn-search"><i
                                class="pe-7s-search"></i></a>
                        <a @if(auth()->check()) href="{{route('frontend.profile')}}"
                            @else href="{{route('frontend.loginForm')}}" @endif
                            class="header-action-btn d-none d-md-block"><i class="pe-7s-user"></i></a>
                        <a href="{{route('frontend.wishlist')}}"
                            class="header-action-btn header-action-btn-wishlist d-none d-md-block">
                            <i class="pe-7s-like"></i>
                        </a>
                        <a href="javascript:void(0)" class="header-action-btn header-action-btn-cart">
                            <i class="pe-7s-shopbag"></i>
                            <span class="header-action-num cart_icon">@if(auth()->check())
                                {{auth()->user()?->cart?->infos->count() ?? 0}}
                                @else
                                {{count(session()->get('carts',[]))}}
                                @endif</span>
                        </a>
                    </div>
                    <div class="col-xl-1 col-2 responsive_fix p-0">
                        <div class="header-actions">
                            <a href="javascript:void(0)" class="header-action-btn header-action-btn-search d-xl-none">
                                <i class="pe-7s-search"></i>
                            </a>
                            <div class="header-top-lan-curr-link justify-content-end d-xl-none m-0">
                            <div class="header-top-lan dropdown">
                                <button class="dropdown-toggle height-30" data-bs-toggle="dropdown">
                                    <div class="img-width-box">
                                        <img class="img-width"
                                            src="{{$langs->where('code',locale())->first()->first_image}}"
                                            alt="{{$langs->where('code',locale())->first()->name}}" />
                                    </div>
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul
                                    class="dropdown-menu dropdown-menu-right animate slideIndropdown width_new_countries">
                                    @foreach($langs as $lang)
                                    @if(locale() != $lang->code )
                                    <li class="head_lang_item">
                                        <a class="dropdown-item" data-lang="{{$lang->code}}"
                                            href="{{ route('frontend.lang.switch', $lang->code) }}">
                                            <div class="img-width-box">
                                                <img class="img-width" src="{{$lang->first_image}}"
                                                    alt="{{$lang->name}}" />
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @include('frontend.includes.sections.mobile_menu')
   @include('frontend.includes.sections.search')
    @include('frontend.pages.cart.popup')
</div>
