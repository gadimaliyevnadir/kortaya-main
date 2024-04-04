<div class="section">
    <div class="container">
        <div class="border-top">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($brands as $index=>$brand)
                                    <div class="swiper-slide single-brand-logo" data-aos="fade-up" data-aos-delay="{{$index + 1}}00">
                                        <a href="{{route('frontend.brand.detail',['brand'=>$brand])}}"><img src="{{$brand->first_image}}"
                                                         alt="Brand Logo"></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
