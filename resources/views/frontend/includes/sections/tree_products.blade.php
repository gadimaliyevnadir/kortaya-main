<div class="section section-margin">
    <div class="container">
        <div class="row mb-n6">
            @foreach($banners->where('banner_type', 1)->take(3) as $index=>$banner)
                <div class="col-lg-4 col-md-6 col-12 mb-6">
                    <div class="banner" data-aos="fade-up" data-aos-delay="{{$index + 1}}00">
                        <div class="banner-image">
                            <a href="{{route('frontend.searchPage')}}"><img src="{{$banner->first_image}}" alt="" /></a>
                        </div>
                        <div class="info">
                            <div class="small-banner-content">
                                <h4 class="sub-title">{!! strip_tags(translation($banner)->name) !!}</h4>
                                <h3 class="title">{!! strip_tags(translation($banner)->text) !!}</h3>
                                <a href="{{route('frontend.searchPage')}}" class="btn btn-dark btn-sm">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
