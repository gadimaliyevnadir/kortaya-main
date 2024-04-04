<section class="branddetail_products">
    <div class="container branddetail_products_box">
        <div class="branddetail_products_left">
            <div class="branddetailTotal">
                <p class="branddetailTotal_text">Total <span
                        class="branddetailTotal_text_bold">{{$products->total()}}</span> Produtcs</p>
            </div>
            <div class="branddetailSelect">
                <form action="{{ route('frontend.brand.detail',['brand'=>$brand]) }}" method="get">
                    <select id="branddetailSelect_item" class="nice-select branddetailSelect_item"
                            aria-label=".form-select-sm example" onchange="this.form.submit()" name="sort_by">
                        <option value="0" selected>Short by Default</option>
                        <option value="1" @if(request()->has('sort_by') && request()->get('sort_by') == '1') selected
                            @endif >
                            Ən yenilər
                        </option>
                        <option value="2" @if(request()->has('sort_by') && request()->get('sort_by') == '2') selected
                            @endif >
                            Ən kohneler
                        </option>
                    </select>
                </form>
            </div>
        </div>
        <div class="branddetail_products_right">
            <div class="branddetail_products_right_box">
                @foreach($products as $product)
                    <div class="prdList__item">
                        <div class="thumbnail">
                            <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}"><img
                                    src="{{$product->first_from_images}}"
                                    id="eListPrdImage890_1" alt="3CE VELVET LIP TINT 4g" loading="lazy"></a>
                            <div class="likeButton ">
                                <button type="button"><strong></strong></button>
                            </div>
                            <div class="badge"><span></span></div>
                            <div class="icon__box">
                            <span class="wish like_btn"
                                  data-url="{{route('frontend.like',['product'=>$product])}}"
                            ><img src="//img.echosting.cafe24.com/design/skin/admin/ko_KR/btn_wish_before.png"
                                        class="icon_img ec-product-listwishicon"
                                        alt="Before add to wish list">WISH</span>
                                <span class="cart add_basket_btn"
                                      data-url="{{route('frontend.addBasket',['product'=>$product])}}"
                                      data-combination="{{$product->main()->pivot->id}}"
                                ><img
                                        src="//img.echosting.cafe24.com/design/skin/admin/en_US/btn_list_cart.gif"
                                        alt="Add to cart" class="ec-admin-icon cart">ADD</span>
                            </div>
                            <div class="sale_box">{{$product->main()->pivot->discount_rate}}%</div>
                        </div>
                        <div class="description">
                            <div class="name">
                                <span class="brdName">{{$product->name}}</span>
                                <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}" class=" title_a"
                                    style=""><span style="font-size:13px;color:#000000;">{{translation($product)->title}}</span></a>
                            </div>
                            <ul class="xans-element- xans-product xans-product-listitem spec priceB">
                                <li class="displaynone upper_title xans-record-">
                                    <strong class="title displaynone"> </strong> <span
                                        style="font-size:16px;color:#2d7dec;font-weight:bold;">{{$product->name}}</span></li>
                                <!-- <li class=" sub_title xans-record-">
                                    <strong class="title "> </strong> <span style="font-size:12px;color:#3507eb;">2025-11-23 ~</span>
                                </li> -->
                                <li class=" sub_title xans-record-">
                                    <strong class="title displaynone"></strong> <span
                                        style="font-size:12px;color:#555555;">{{translation($product)->title}}</span>
                                </li>
                                <li class=" sub_title xans-record-">
                                    <strong class="title displaynone"> </strong> <span
                                        style="font-size:12px;color:#555555;text-decoration:line-through;">${{$product->main()->pivot->price}}</span>
                                </li>
                                <li class=" sub_title xans-record-">
                                    <strong class="title displaynone"> </strong> <span
                                        style="font-size:18px;color:#2d7dec;font-weight:bold;">${{$product->main()->pivot->discount_price}}</span><span
                                        id="span_product_tax_type_text" style=""> </span></li>
                            </ul>
                            <div class="icon"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('frontend.layouts.pagination_tree',['items'=>$products])
        </div>
    </div>
</section>
<section class="detail_highlighted_section">
    <div class="container detail_highlighted_section_box">
        <div class="best_items_brands">
            <div class="detail_highlighted_section_title">
                Today's BEST Item
            </div>
            <div class="detail_highlighted_section_slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($statuses->where('code', 'todays_best_item')->first()?->products as $index=>$product)
                            <div class="swiper-slide">
                                <div class="prdList__item min-height-unset">
                                    <div class="thumnail">
                                        <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}">
                                            <img src="{{$product->first_from_images}}"></a>
                                    </div>
                                    <div class="description">
                                        <div class="name"><a
                                                href="{{route('frontend.product.detail',['product'=>$product->slug])}}"
                                                class="title_a"><span style="font-size:12px !important;color:#000000;">{{$product->name}}</span></a>
                                        </div>
                                        <ul class="xans-element- xans-product xans-product-listitem spec priceB">
                                            <!-- <li class="upper_title xans-record-"></li>
                                            <li class="sub_title xans-record-"></li> -->
                                            <li class="sub_title xans-record-"><span
                                                    style="font-size:12px;color:#555555; display:none;">
                                                    {{translation($product)->title}}</span>
                                            </li>
                                            <li class="sub_title xans-record-" style="margin-top:3px;"><span
                                                    style="font-size:12px;color:#555555;text-decoration:line-through;">${{$product->main()->pivot->price}}</span>
                                            </li>
                                            <li class="sub_title xans-record-"><span
                                                    style="font-size:15px;color:#2d7dec;font-weight:bold;">${{$product->main()->pivot->discount_price}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="top_viewed_brands">
            <div class="detail_highlighted_section_title">
                Today's TOP Viewed Item
            </div>
            <div class="detail_highlighted_section_slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($statuses->where('code', 'todays_top_viewed_item')->first()?->products as $index=>$product)
                            <div class="swiper-slide">
                                <div class="prdList__item min-height-unset">
                                    <div class="thumnail">
                                        <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}">
                                            <img src="{{$product->first_from_images}}"></a>
                                    </div>
                                    <div class="description">
                                        <div class="name"><a
                                                href="{{route('frontend.product.detail',['product'=>$product->slug])}}"
                                                class="title_a"><span style="font-size:12px !important;color:#000000;">{{$product->name}}</span></a>
                                        </div>
                                        <ul class="xans-element- xans-product xans-product-listitem spec priceB">
                                            <!-- <li class="upper_title xans-record-"></li>
                                            <li class="sub_title xans-record-"></li> -->
                                            <li class="sub_title xans-record-"><span
                                                    style="font-size:12px;color:#555555; display:none;">
                                                    {{translation($product)->title}}</span>
                                            </li>
                                            <li class="sub_title xans-record-" style="margin-top:3px;"><span
                                                    style="font-size:12px;color:#555555;text-decoration:line-through;">${{$product->main()->pivot->price}}</span>
                                            </li>
                                            <li class="sub_title xans-record-"><span
                                                    style="font-size:15px;color:#2d7dec;font-weight:bold;">${{$product->main()->pivot->discount_price}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination special-dumb"></div>
                </div>
            </div>
        </div>
        <div class="high_order_rate_brands">
            <div class="detail_highlighted_section_title">
                Items with a High Order Rate
            </div>
            <div class="detail_highlighted_section_slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($statuses->where('code', 'items_with_a_high_order_rate')->first()?->products as $index=>$product)
                            <div class="swiper-slide">
                                <div class="prdList__item min-height-unset">
                                    <div class="thumnail">
                                        <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}">
                                            <img src="{{$product->first_from_images}}"></a>
                                    </div>
                                    <div class="description">
                                        <div class="name"><a
                                                href="{{route('frontend.product.detail',['product'=>$product->slug])}}"
                                                class="title_a"><span style="font-size:12px !important;color:#000000;">{{$product->name}}</span></a>
                                        </div>
                                        <ul class="xans-element- xans-product xans-product-listitem spec priceB">
                                            <!-- <li class="upper_title xans-record-"></li>
                                            <li class="sub_title xans-record-"></li> -->
                                            <li class="sub_title xans-record-"><span
                                                    style="font-size:12px;color:#555555; display:none;">
                                                    {{translation($product)->title}}</span>
                                            </li>
                                            <li class="sub_title xans-record-" style="margin-top:3px;"><span
                                                    style="font-size:12px;color:#555555;text-decoration:line-through;">${{$product->main()->pivot->price}}</span>
                                            </li>
                                            <li class="sub_title xans-record-"><span
                                                    style="font-size:15px;color:#2d7dec;font-weight:bold;">${{$product->main()->pivot->discount_price}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="new_item_brands">
            <div class="detail_highlighted_section_title">
                New Item
            </div>
            <div class="detail_highlighted_section_slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($statuses->where('code', 'new_item')->first()?->products as $index=>$product)
                            <div class="swiper-slide">
                                <div class="prdList__item min-height-unset">
                                    <div class="thumnail">
                                        <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}">
                                            <img src="{{$product->first_from_images}}"></a>
                                    </div>
                                    <div class="description">
                                        <div class="name"><a
                                                href="{{route('frontend.product.detail',['product'=>$product->slug])}}"
                                                class="title_a"><span style="font-size:12px !important;color:#000000;">{{$product->name}}</span></a>
                                        </div>
                                        <ul class="xans-element- xans-product xans-product-listitem spec priceB">
                                            <!-- <li class="upper_title xans-record-"></li>
                                            <li class="sub_title xans-record-"></li> -->
                                            <li class="sub_title xans-record-"><span
                                                    style="font-size:12px;color:#555555; display:none;">
                                                    {{translation($product)->title}}</span>
                                            </li>
                                            <li class="sub_title xans-record-" style="margin-top:3px;"><span
                                                    style="font-size:12px;color:#555555;text-decoration:line-through;">${{$product->main()->pivot->price}}</span>
                                            </li>
                                            <li class="sub_title xans-record-"><span
                                                    style="font-size:15px;color:#2d7dec;font-weight:bold;">${{$product->main()->pivot->discount_price}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
