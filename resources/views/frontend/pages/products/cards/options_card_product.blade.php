<div class="swiper-slide product-list-wrapper mb-n6">
    <div class="single-product-list product-hover mb-6">
        <div class="thumb">
            <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}" class="image">
                <img class="first-image" src="{{$product->first_from_images}}"
                     alt="Product"/>
                <img class="second-image" src="{{$product->second_from_images}}"
                     alt="Product"/>
            </a>
        </div>
        <div class="content">
            <h5 class="title"><a href="{{route('frontend.product.detail',['product'=>$product->slug])}}">{{$product->name}}</a>
            </h5>
            <span class="price">
                                                <span class="new">${{$product->main()->pivot->discount_price}}</span>
                                                <span class="old">${{$product->main()->pivot->price}}</span>
                                            </span>
            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: {{$product->rate()}}%"></span>
                                                </span>
                                            </span>
        </div>
    </div>
</div>
