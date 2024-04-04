<div class="section mt-0 overflow-x-hidden">
    <div class="container p-test">
        <div class="row p-0-test">
            <div class="col-md-3 col-12 row p-test-top">
                <div class="col-12 padding-0-respon">
                <h3 class="category_name pt-2 mb-5 aos-init aos-animate" data-aos="fade-left" data-aos-delay="300">NEW PRODUCT<span class="category_name_dot">.</span></h3>
                    <ul class="product-tab-nav nav row mb-10-own mt-n3 flex-nowrap flex-md-wrap">
                        <li class="nav-item" data-aos="fade-left" data-aos-delay="300"><a
                                class="nav-link active mt-3" data-bs-toggle="tab" href="#solution_two"
                            >{{translation($categoriesAll_new_products->where('code','solution')->first())->name}}</a></li>

                        <li class="nav-item" data-aos="fade-left" data-aos-delay="400"><a class="nav-link mt-3"
                                                                                          data-bs-toggle="tab"
                                                                                          href="#skincare_two"
                            >{{translation($categoriesAll_new_products->where('code','skincare')->first())->name}}</a></li>

                        <li class="nav-item" data-aos="fade-left" data-aos-delay="500"><a class="nav-link mt-3"
                                                                                          data-bs-toggle="tab"
                                                                                          href="#makeup_two"
                            >{{translation($categoriesAll_new_products->where('code','makeup')->first())->name}} & {{translation($categoriesAll_new_products->where('code','accessory')->first())->name}}</a></li>

                        <li class="nav-item" data-aos="fade-left" data-aos-delay="500"><a class="nav-link mt-3"
                                                                                          data-bs-toggle="tab"
                                                                                          href="#body_two"
                            >{{translation($categoriesAll_new_products->where('code','hair')->first())->name}} & {{translation($categoriesAll_new_products->where('code','body')->first())->name}}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-12 row p-0-test">
                <div class="col p-0-test">
                    <div class="tab-content position-relative">
                        <div class="tab-pane fade show active" id="solution_two">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper align-items-stretch">
                                        @foreach($categoriesAll_new_products->where('code', 'solution')->first()->products as  $index=>$product)
                                            @include('frontend.pages.products.cards.status_card_product')
                                        @endforeach
                                    </div>

                                    <div class="swiper-pagination d-none"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="skincare_two">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper mb-n10">
                                        @foreach($categoriesAll_new_products->where('code', 'skincare')->first()->products as  $index=>$product)
                                            @include('frontend.pages.products.cards.status_card_product')
                                        @endforeach
                                    </div>

                                    <div class="swiper-pagination d-none"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="makeup_two">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper mb-n10">
                                        @foreach($categoriesAll_new_products->where('code', 'makeup')->first()->products as  $index=>$product)
                                            @include('frontend.pages.products.cards.status_card_product')
                                        @endforeach
                                    </div>

                                    <!-- <div class="swiper-pagination d-md-none"></div> -->

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="body_two">
                            <div class="product-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper mb-n10">
                                        @foreach($categoriesAll_new_products->where('code', 'body')->first()->products as  $index=>$product)
                                            @include('frontend.pages.products.cards.status_card_product')
                                        @endforeach
                                    </div>

                                    <!-- <div class="swiper-pagination d-md-none"></div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
