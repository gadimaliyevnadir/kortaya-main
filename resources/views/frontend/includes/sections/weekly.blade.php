<div class="section hero-slider weekly_discount_section">
    <div class="container">
        <div class="week_days_name">
            <p class="week_days_items active">MON</p>
            <p class="week_days_items">TUE</p>
            <p class="week_days_items">WED</p>
            <p class="week_days_items">THU</p>
            <p class="week_days_items">FRI</p>
            <p class="week_days_items">SAT</p>
            <p class="week_days_items">SUN</p>
        </div>
        <div class="week_cards_box">
            <h3 class="category_name category_name_discount_field pt-2 mb-0" data-aos="fade-left" data-aos-delay="300">Weekly deal</h3>
            <p id="week_name_inside" class="week_name_inside">Only Monday</p>
            <div class="week_cards_for_items">
                <div class="week_cards_for_items_box" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','monday')->first()->products->take(8) as $product)
                                @include('frontend.pages.products.cards.weekly_product')
                            @endforeach
                        </div>                        
                    </div>
                </div>
                <div class="week_cards_for_items_box" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','tuesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_product')
                            @endforeach
                        </div>                                       
                    </div>
                </div>
                <div class="week_cards_for_items_box" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_product')
                            @endforeach
                        </div>                                                      
                    </div>
                </div>
                <div class="week_cards_for_items_box" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_product')
                            @endforeach
                        </div>                                                                              
                    </div>
                </div>
                <div class="week_cards_for_items_box" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_product')
                            @endforeach
                        </div>                                                                                                      
                    </div>
                </div>
                <div class="week_cards_for_items_box" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_product')
                            @endforeach
                        </div>                                                                                                      
                    </div>
                </div>
                <div class="week_cards_for_items_box" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_product')
                            @endforeach
                        </div>                                                                                                                              
                    </div>
                </div>
                <div class="week_cards_for_items_box" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_product')
                            @endforeach
                        </div>                                                                                                                              
                    </div>
                </div>
                <div class="week_cards_for_items_box2 d-md-none" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper2">
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','monday')->first()->products->take(8) as $product)
                                @include('frontend.pages.products.cards.weekly_productThumb')
                            @endforeach
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','tuesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_productThumb')
                            @endforeach
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_productThumb')
                            @endforeach
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_productThumb')
                            @endforeach
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_productThumb')
                            @endforeach
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_productThumb')
                            @endforeach
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($weekly_products->where('code','wednesday')->first()->products->take(8)  as $product)
                                @include('frontend.pages.products.cards.weekly_productThumb')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
