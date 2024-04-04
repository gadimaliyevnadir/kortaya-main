<div class="swiper-slide product-wrapper" data-aos="fade-right"
     data-aos-delay="{{$index + 1}}00">
    <div class="product single-deal-product product-border-left">
        <div class="thumb">
            <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}" class="image">
                <img src="{{ $product->first_image}}" alt="Product"/>
            </a>
            <span class="badges"> <span class="sale">{{$product->main()->pivot->discount_rate}}%</span></span>
        </div>
        <div class="content">
            <p class="inner-desc">{{translation($products_day->where('product_id',$product->id)->first())?->title}}</p>
            <div class="countdown-area">
                <div class="countdown-wrapper d-flex"
                     data-countdown="{{\Illuminate\Support\Carbon::parse($products_day->where('product_id',$product->id)->first()->expired_at)->format('Y/m/d')}}"></div>
            </div>
{{--            <h4 class="sub-title"><a href="">Studio Design</a></h4>--}}
            <h5 class="title"><a href="{{route('frontend.product.detail',['product'=>$product->slug])}}">{{$product->name}}</a></h5>
            <span class="ratings">
                <span class="rating-wrap">
                    <span class="star" style="width: {{$product->rate()}}%"></span>
                </span>
            </span>
            <span class="price">
                <span class="new">${{$product->main()->pivot->discount_price}}</span>
                <span class="old">${{$product->main()->pivot->price}}</span>
            </span>
            <button
                class="btn btn-sm btn-outline-dark btn-hover-primary add_basket_btn"
                data-url="{{route('frontend.addBasket',['product'=>$product])}}"
                data-combination="{{$product->main()->pivot->id}}"
            >Add To Cart
            </button>
        </div>
    </div>
</div>
