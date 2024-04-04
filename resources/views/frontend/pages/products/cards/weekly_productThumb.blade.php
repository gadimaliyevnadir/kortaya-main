<div class="swiper-slide  ">
    <div class="week_slider_img week_slider_img_86 @if($loop->first) active @endif">
        <!-- <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}"> -->
        <img src="{{$product->first_image}}" alt="$product->transname" />
        <!-- </a> -->
    </div>
</div>
