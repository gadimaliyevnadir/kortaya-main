<div class="row">
    <div class="col-12">
        <div class="section-title aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <h2 class="title pb-3">You Might Also Like</h2>
            <span></span>
            <div class="title-border-bottom"></div>
        </div>
    </div>
    <div class="col">
        <div class="product-carousel">

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($similar_products as $product)
                        @include('frontend.pages.products.cards.status_card_product')
                   @endforeach
                </div>
                <div class="swiper-pagination d-md-none"></div>

                <div
                    class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none">
                    <i class="pe-7s-angle-right"></i></div>
                <div
                    class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none">
                    <i class="pe-7s-angle-left"></i></div>

            </div>

        </div>
    </div>

</div>
