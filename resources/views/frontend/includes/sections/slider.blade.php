<div class="section">
    <div class="hero-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="hero-slide-item swiper-slide">
                        <div class="hero-slide-bg">
                            <img src="{{$slider->first_image}}" alt="Slider Image"/>
                        </div>

                        <div class="container">
                            <div class="hero-slide-content">
                                <h2 class="title">
                                    {!! translation($slider)->name !!}
                                </h2>
                                <p>{{translation($slider)->text}}</p>
                                <a href="{{route('frontend.searchPage')}}" class="btn btn-lg btn-primary btn-hover-dark">Shop Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination d-md-none"></div>

            <div class="home-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i
                    class="pe-7s-angle-left"></i></div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i
                    class="pe-7s-angle-right"></i></div>
        </div>
    </div>
</div>
