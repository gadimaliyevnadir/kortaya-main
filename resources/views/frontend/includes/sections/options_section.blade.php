<div class="section section-padding">
    <div class="container">
        <div class="row mb-n8">
            <div class="col-12 mb-8" data-aos="fade-up" data-aos-delay="300">
                <div class="product-list-title">
                    <h2 class="title pb-3 mb-0">{{translation(product_statuses('best_offer'))->name}}</h2>
                    <span></span>
                </div>
                <div class="product-list-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($statuses->where('code', 'best_offer')->first()->products as  $product)
                                @include('frontend.pages.products.cards.options_card_product')
                            @endforeach
                        </div>
                        <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i>
                        </div>
                        <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-8" data-aos="fade-up" data-aos-delay="500">
                <div class="product-list-title">
                    <h2 class="title pb-3 mb-0">{{translation(product_statuses('new_products'))->name}}</h2>
                    <span></span>
                </div>
                <div class="product-list-carousel-2">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($statuses->where('code', 'best_offer')->first()->products as  $product)
                                @include('frontend.pages.products.cards.options_card_product')
                            @endforeach
                        </div>
                        <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i>
                        </div>
                        <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-8" data-aos="fade-up" data-aos-delay="700">
                <div class="product-list-title">
                    <h2 class="title pb-3 mb-0">{{translation(product_statuses('best_sellers'))->name}}</h2>
                    <span></span>
                </div>
                <div class="product-list-carousel-3">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($statuses->where('code', 'best_offer')->first()->products as  $product)
                                @include('frontend.pages.products.cards.options_card_product')
                            @endforeach
                        </div>
                        <div class="swiper-product-list-next swiper-button-next"><i class="pe-7s-angle-right"></i>
                        </div>
                        <div class="swiper-product-list-prev swiper-button-prev"><i class="pe-7s-angle-left"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
