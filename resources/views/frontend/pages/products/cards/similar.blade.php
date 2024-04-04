<div class="swiper-slide product-wrapper">
    <div class="product product-border-left" data-aos="fade-up" data-aos-delay="400">
        <div class="thumb">
            <a href="{{route('frontend.product.detail',['product'=>$similar_product->slug])}}" class="image">
                <img class="first-image"
                     src="{{$similar_product->first_from_images}}"
                     alt="Product"/>
                <img class="second-image"
                     src="{{$product->second_from_images}}"
                     alt="Product"/>
            </a>
            <span class="badges">
                @foreach($similar_product->badges as $badge)
                    <span class="sale">{{translation($badge)->name}}</span>
                @endforeach
            </span>
            <div class="actions">
                <a href="#" class="action wishlist like_btn"
                   data-url="{{route('frontend.like',['product'=>$similar_product])}}"><i class="pe-7s-like"
                       ></i></a>
                <a href="#" class="action quickview get_popup_data_product" data-bs-toggle="modal"
                   data-bs-target="#exampleModalCenter"
                   data-url="{{route('frontend.product.popupDate',['product'=>$similar_product])}}"
                   data-combination="{{$similar_product->main()->pivot->id}}"
                ><i class="pe-7s-search"></i></a>
            </div>
        </div>
        <div class="content">
            <h4 class="sub-title"><a href="{{route('frontend.product.detail',['product'=>$similar_product->slug])}}">{{$similar_product->name}}</a></h4>
            <h5 class="title"><a href="{{route('frontend.product.detail',['product'=>$similar_product->slug])}}">{{$similar_product->name}}</a>
            </h5>
            <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: {{$product->rate()}}%"></span>
                                            </span>
                                            </span>
            <span class="price">
                                                    <span
                                                        class="new">${{$similar_product->main()->pivot->discount_price}}</span>
                                            <span class="old">${{$similar_product->main()->pivot->price}}</span>
                                            </span>
            <button class="btn btn-sm btn-outline-dark btn-hover-primary add_basket_btn"
                    data-url="{{route('frontend.addBasket',['product'=>$similar_product])}}"
                    data-combination="{{$similar_product->main()->pivot->id}}">Add To Cart
            </button>
        </div>
    </div>

</div>

