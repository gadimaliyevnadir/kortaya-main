<div class="section section-padding brands_own">
    <div class="container">
        <h2 class="category_name pt-2 mb-5" data-aos="fade-left" data-aos-delay="300">Brands<span
                class="category_name_dot">.</span></h2>
        <div class="brands_own_box" data-aos="fade-left" data-aos-delay="400">
            <div class="swiper-container">
                <div class="swiper-wrapper grid-container">
                @foreach($brands as $brand)
            <div class="swiper-slide">
            <div class="item1">
                    <a href="{{route('frontend.brand.detail', ['brand' => $brand])}}">
                        <img src="{{$brand->first_image}}" alt="" />
                    </a>
                </div>
            </div>
            @endforeach
                </div>

                
            </div>
            <div class="swiper-button-brand-prev">
                  
                  </div>
                  <div class="swiper-button-brand-next">
                 
  
                  </div>
        </div>
    </div>
</div>
