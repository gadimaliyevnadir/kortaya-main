<div class="mobile-menu-wrapper">
    <div class="offcanvas-overlay"></div>
    <div class="mobile-menu-inner">
        <div class="div_mobile_menu_head d-flex justify-content-between align-items-center px-3">
            <div class="mobile_logo">
                <a href="{{route('frontend.dashboard')}}" class="logo-white">
                    <img src="{{asset('frontend/assets/images/kortayaLogo/korteya_icon_favicon_512px.png')}}" alt="favicon" />
                    <img src="{{asset('frontend/assets/images/kortayaLogo/korteya_logo_ikonsuz_ag.svg')}}" alt="Site Logo"/>
                </a>
            </div>
            <div class="offcanvas-btn-close mobile_menu_closing">
                <i class="pe-7s-close"></i>
            </div>
        </div>
        <div class="benefits benefits-mobile d-flex align-items-center gap-3 py-1 mt-3 px-3">
            <div class="new_header_item d-flex align-items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#000" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2H248.4c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48H542.8c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32z"/></svg>
                <a href="{{route('frontend.about')}}">Shipping</a>
            </div>
            <div class="new_header_item d-flex align-items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#000" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z"/></svg>
                <a href="{{route('frontend.about')}}">Benefits</a>
            </div>
            <div class="new_header_item d-flex align-items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" fill="#000" width="16" viewBox="0 0 512 512"><path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                <a href="{{route('frontend.faqs')}}">Faq</a>
            </div>
        </div>
        @if(auth()->check())
        <div class="mobile_account_menu">
            <a href="{{route('frontend.profile')}}" class="mobile_account_menu_link">
                <img class="mobile_account_menu_img"
                     src="{{asset('frontend/assets/images/test/mobile/user.svg')}}"/>
                My page
            </a>
            <a href="{{route('frontend.cart')}}" class="mobile_account_menu_link">
                <img class="mobile_account_menu_img"
                     src="{{asset('frontend/assets/images/test/mobile/bag-2.svg')}}"/>
                Cart
            </a>
            <a href="{{route('frontend.orderTracking')}}" class="mobile_account_menu_link">
                <img class="mobile_account_menu_img"
                     src="{{asset('frontend/assets/images/test/mobile/shop.svg')}}"/>
                Order
            </a>
            <a href="{{route('frontend.logout')}}" class="mobile_account_menu_link">
                <img class="mobile_account_menu_img"
                     src="{{asset('frontend/assets/images/test/mobile/user-minus.svg')}}"/>
                Sign Out
            </a>
        </div>
        @else
            <div class="mobile_account_menu">
                <a href="{{route('frontend.register.form')}}" class="mobile_account_menu_link">
                    <img class="mobile_account_menu_img"
                         src="{{asset('frontend/assets/images/test/mobile/user-add.svg')}}"/>
                    Sign up
                </a>
                <a href="{{route('frontend.loginForm')}}" class="mobile_account_menu_link">
                    <img class="mobile_account_menu_img"
                         src="{{asset('frontend/assets/images/test/mobile/user.svg')}}"/>
                    Sign in
                </a>
                <a href="{{route('frontend.cart')}}" class="mobile_account_menu_link">
                    <img class="mobile_account_menu_img"
                         src="{{asset('frontend/assets/images/test/mobile/bag-2.svg')}}"/>
                    Cart
                </a>
                <a href="{{route('frontend.orderTracking')}}" class="mobile_account_menu_link">
                    <img class="mobile_account_menu_img"
                         src="{{asset('frontend/assets/images/test/mobile/shop.svg')}}"/>
                    Order
                </a>
            </div>
        @endif
        <div class="mobile-navigation px-3">
            <nav>
                <ul class="mobile-menu">
                    @include('frontend.includes.sections.header_mobile_menus')
                </ul>
            </nav>
        </div>
        <div class="mobile_buttom">
            <ul class="mobile-menu border_mobile px-3">
                <li class="has-children position-static">
                    <a href="#"><span class="mobile-menu-span">Customers</span>
                    <ul class="dropdown">
                        <li>
                            <a href="#">Notice</a>
                        </li>
                        <li>
                            <a href="#">DELIVERY GUIDE & PRECAUTIONS</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">Q & A</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
