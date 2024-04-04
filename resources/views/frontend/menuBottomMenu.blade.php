<div id="bottomMenu" class="mobile_bottom_menu">
    <div class="mobile_bottom_box">
        <a href="javascript:void(0)" class="header-action-btn header-action-btn-menu mobile_menu_bottom_bars">
            <i class="fa fa-bars"></i>
        </a>
        <a href="javascript:void(0)" class="header-action-btn header-action-btn-search">
            <img src="{{asset('frontend/assets/images/test/mobile/bottomIcon.svg')}}" alt="Home svg" />
        </a>
        <a href="{{route('frontend.profile')}}">
            <img src="{{asset('frontend/assets/images/test/mobile/bottomHome.svg')}}" alt="Home svg" />
        </a>
        <a href="javascript:void(0)" class="header-action-btn header-action-btn-cart">
            <i class="pe-7s-shopbag"></i>
            <span class="header-action-num cart_icon">
                @if(auth()->check())
                    {{auth()->user()?->cart?->infos->count() ?? 0}}
                @else
                    {{count(session()->get('carts',[]))}}
                @endif</span>
        </a>
        <a href="{{route('frontend.profile')}}" class="header-action-btn">
            <i class="pe-7s-user"></i>
        </a>
    </div>
</div>
