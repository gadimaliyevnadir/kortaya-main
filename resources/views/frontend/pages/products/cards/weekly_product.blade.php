<div class="swiper-slide">
    <div class="week_slider_img">
        @if($product->main()->pivot->discount_rate)
            <div class="discount"> {{$product->main()->pivot->discount_rate}}%</div>
        @endif
        <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}">
            <img src="{{$product->first_image}}" alt="test">
        </a>
    </div>
    <div class="week_slider_content">
        <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}">
            <h6 class="week_title">{{\Illuminate\Support\Str::limit(translation($product)->title,50)}}</h6>
        </a>
        <p class="week_text m-0">{{\Illuminate\Support\Str::limit(translation($product)->text,30)}}</p>
        <div class="week_prices">
            <p class="discount_price">${{$product->main()->pivot->discount_price}}</p>
            <p class="nodiscount_price">${{$product->main()->pivot->price}}</p>
        </div>
    </div>
</div>
