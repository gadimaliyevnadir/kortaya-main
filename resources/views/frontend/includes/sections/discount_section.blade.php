<div class="section overflow-hidden discount-section-padding">
    <div class="container">
        <div class="row justify-content-center justify-content-md-start" style="margin: 0 auto;">
            <div class="col-md-3 col-12 row p-test-top">
                <div class="сol-md-3 col-12">
                    <div>
                        <div class="section-title mb-0 mb-md-2" data-aos="fade-right" data-aos-delay="300">
                            <h3 class="category_name pt-2 mb-md-5 aos-init aos-animate" data-aos="fade-left"
                                data-aos-delay="300">Daily Deals<abbr class="category_name_dot">.</abbr></h3>
                        </div>
                        <ul class="product-tab-nav nav row mt-n3" data-aos="fade-left" data-aos-delay="300">
                            <li class="nav-item"><a class="nav-link active mt-3" data-bs-toggle="tab"
                                                    href="#product-deal-new"
                                >{{translation(product_statuses('new_arrivals'))->name}}</a></li>

                            <li class="nav-item"><a class="nav-link mt-3" data-bs-toggle="tab"
                                                    href="#product-deal-best"
                                >{{translation(product_statuses('best_sellers'))->name}}</a></li>

                            <li class="nav-item"><a class="nav-link mt-3" data-bs-toggle="tab"
                                                    href="#product-deal-sale"
                                >{{translation(product_statuses('sale_items'))->name}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-12 row p-0-test">
                <div class="col padding-0-respon">
                    <div class="tab-content position-relative">
                        <div class="tab-pane fade show active" id="product-deal-new">
                            <div class="product-deal-carousel margin-0-respon">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @if($products_by_day['new_arrivals'])
                                            @foreach($products_by_day['new_arrivals'] as $index=>$product)
                                                @include('frontend.pages.products.cards.day_products')
                                            @endforeach
                                            @foreach($products_by_day['new_arrivals'] as $index=>$product)
                                                @include('frontend.pages.products.cards.day_products')
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="swiper-pagination d-md-none"></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="product-deal-best">
                            <div class="product-deal-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @if($products_by_day['best_sellers'])
                                            @foreach($products_by_day['best_sellers'] as $index=>$product)
                                                @include('frontend.pages.products.cards.day_products')
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="swiper-pagination d-md-none"></div>

                                    <div
                                        class="swiper-product-deal-next swiper-button-next swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-right"></i>
                                    </div>
                                    <div
                                        class="swiper-product-deal-prev swiper-button-prev swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="product-deal-sale">
                            <div class="product-deal-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">

                                        @if($products_by_day['sale_items'])
                                            @foreach($products_by_day['sale_items'] as $index=>$product)
                                                @include('frontend.pages.products.cards.day_products')
                                            @endforeach
                                        @endif

                                    </div>

                                    <div class="swiper-pagination d-md-none"></div>

                                    <div
                                        class="swiper-product-deal-next swiper-button-next swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-right"></i>
                                    </div>
                                    <div
                                        class="swiper-product-deal-prev swiper-button-prev swiper-button-white d-md-flex d-none">
                                        <i class="pe-7s-angle-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
