<div class="swiper-slide product-wrapper">
    <div class="prdList__item">
        <div class="thumbnail">
            <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}"><img
                    src="{{$product->first_from_images}}" id="eListPrdImage190_32"
                    alt="Beauty of joseon Relief Sun : Rice + Probiotics 50ml" class="swiper-lazy swiper-lazy-loaded"
                    loading="lazy"></a>
            <div class="icon__box">
                <span class="wish like_btn" data-url="{{route('frontend.like',['product'=>$product])}}"><img
                        src="//img.echosting.cafe24.com/design/skin/admin/ko_KR/btn_wish_before.png"
                        class="icon_img ec-product-listwishicon " alt="Before add to wish list">WISH</span>
                <span class="cart add_basket_btn" data-url="{{route('frontend.addBasket',['product'=>$product])}}"
                    data-combination="{{$product->main()->pivot->id}}"><img
                        src="//img.echosting.cafe24.com/design/skin/admin/en_US/btn_list_cart.gif" alt="Add to cart"
                        class="ec-admin-icon cart">ADD</span>
            </div>
            <div class="sale_box home_sale_box">{{$product->main()->pivot->discount_rate}}%</div>
        </div>
        <div class="description">
            <div class="name">
                <span class="brdName">{{$product->name}}</span><a
                    href="{{route('frontend.product.detail',['product'=>$product->slug])}}" class="title_a"
                    style=""><span style="font-size:12px;color:#555555;">{{translation($product)->title}}</span></a>
            </div>
            <ul
                class="xans-element- xans-product xans-product-listitem-31 xans-product-listitem xans-product-31 spec priceB">
                <li class=" upper_title xans-record-">
                    <strong class="title displaynone">
                    </strong> <span style="display:none"></span>
                </li>
                <li class=" sub_title xans-record-">
                    <strong class="title ">
                    </strong> <span
                        style="font-size:12px;color:#555555;text-decoration:line-through;">${{$product->main()->pivot->discount_price}}</span>
                </li>
                <li class=" sub_title xans-record-">
                    <strong class="title ">
                    </strong> <span
                        style="font-size:12px;color:#2d7dec;">${{$product->main()->pivot->discount_price}}</span><span
                        id="span_product_tax_type_text" style=""> </span>
                </li>
            </ul>
            @foreach($product->badges as $badge)
                <div class="bg_recommend" style="background:#ff4545">{{translation($badge)->name}}</div>
            @endforeach
        </div>
    </div>
</div>