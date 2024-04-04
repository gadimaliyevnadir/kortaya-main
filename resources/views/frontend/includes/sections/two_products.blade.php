<div class="section section-padding-two-product">
    <div class="container">
        <div class="row mb-n6 overflow-hidden d-flex gap-1 justify-content-between flex-nowrap banners_container">
            @foreach($banners->where('banner_type', 3)->take(1) as $banner)
                <div class="banner_image d-none d-md-block" data-aos="fade-right" data-aos-delay="300">
                    <div class="banner">
                        <div class="banner-image">
                            <a href="{{route('frontend.searchPage')}}"><img src="{{$banner->first_image}}"
                                                          alt="Banner Image"></a>
                        </div>
                        <div class="info">
                            <div class="small-banner-content">
                                <!-- <h4 class="sub-title">{!! translation($banner)->text !!}</h4> -->
                                <!-- <h3 class="title">{!! translation($banner)->name !!}</h3> -->
                                <!-- <a href="" class="btn btn-primary btn-hover-dark btn-sm">Shop Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="banner_image" data-aos="fade-right" data-aos-delay="300">
                <div class="banner">
                    <div class="banner-image">
                        <div class="swiper-banner">
                            <div class="swiper-wrapper">
                                    @foreach($banners->where('banner_type', 3)->take(3) as $banner)
                                        <div class="swiper-slide">
                                            <a href="{{route('frontend.searchPage')}}"><img src="{{$banner->first_image}}"
                                                            alt="Banner Image"></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-pagination-two-products"></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
