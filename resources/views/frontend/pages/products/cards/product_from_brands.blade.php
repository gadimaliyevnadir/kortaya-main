<div class="swiper-slide">
    <div class="product" data-aos="fade-up"
         data-aos-delay="{{$index + 1}}00">
        <div class="thumb">
            <a href="#"
               class="image">
                <img class="first-image" src="{{$product->first_from_images}}"
                     alt="Product"/>
                <img class="second-image" src="{{$product->second_from_images}}"
                     alt="Product"/>
            </a>
            <div class="actions">
                <a href="#" class="action wishlist like_btn"
                   data-url="test"><i
                        class="pe-7s-like"></i></a>
                <a href="#" class="action quickview get_popup_data_product"
                   data-url="test"
                   data-combination="test" data-bs-toggle="modal"
                   data-bs-target="#exampleModalCenter"><i class="pe-7s-search"></i></a>
            </div>
        </div>
        <div class="content d-flex flex-column justify-content-between h-100">
            <div class="single-input-item single-item-button">
                <h4 class="sub-title"><a
                        href="#">{{$product->name}}</a></h4>
                <h5 class="title"><a
                        href="#">{{\Illuminate\Support\Str::limit(translation($product)->title,20)}}</a></h5>
                <div>
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: {{$product->rate()}}%"></span>
                                                </span>
                                            </span>
                    <span class="price">
                                    <span class="new">${{$product->main()->pivot->discount_price}}</span>
                                     <span class="old">${{$product->main()->pivot->price}}</span>
                                            </span>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-dark btn-hover-primary add_basket_btn"
                    data-url="test"
                    data-combination="test">Add To Cart
            </button>
        </div>
    </div>
</div>
