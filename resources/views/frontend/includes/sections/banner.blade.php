<div class="section section-padding banner-secondary-section-padding">
    <div class="container">
        <div class="row">
            <div class="height-mobile col-12 p-0" data-aos="fade-up" data-aos-delay="300">
                <div class="swiper">
                    <div class="swiper-wrapper">
                            <!-- @foreach($banners->where('banner_type', 2)->take(1) as $banner)
                            <div class="swiper-slide">
                                <a href="{{route('frontend.searchPage')}}"><img
                                src="{{$banner->first_image}}" alt="Banner"></a>
                            </div>
                            @endforeach -->
                            <div class="swiper-slide">
                                <img src="{{asset("frontend/assets/images/banner1-1.jpg")}}" alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset("frontend/assets/images/banner1-2.jpg")}}" alt="" />
                            </div>
                    </div>
                </div>
                    <!-- <div class="banner">
                        <div class="banner-image">
                            <a href="{{route('frontend.searchPage')}}"><img
                                    src="{{$banner->first_image}}" alt="Banner"></a>
                        </div>
                    </div>
                 -->
            </div>
        </div>
    </div>
</div>
