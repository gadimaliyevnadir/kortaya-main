<div class="offcanvas-search">
    <div class="offcanvas-search-head">
        <h5 class="offcanvas_title">SEARCH</h5>
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
    </div>
    <form method="get" class="offcanvas-search-form" action="{{route('frontend.searchPage')}}">
        <input type="text" name="search" class="offcanvas-search-input" placeholder="Search Here..."/>
        <i class="pe-7s-search"></i>
    </form>
    <div class="hot_keywords">
        <div class="hot_keywords_head">
            <h6 class="hot_keywords_head_left">HOT KEYWORD <span>.</span></h6>
            <div class="hot_keywords_head_right">(base on 7days)</div>
        </div>
        <ul class="keyword_list">
            @if(\Illuminate\Support\Facades\Cache::has('hot_keyword'))
                @foreach(\Illuminate\Support\Facades\Cache::get('hot_keyword') as $index=>$hot_keyword)
                    <li class="keyword_list_item">
                        <a href="#"><span class="active">{{$index +1 }}</span> {{$hot_keyword}}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="hot_keywords">
        <div class="hot_keywords_head">
            <h6 class="hot_keywords_head_left">BEST ITEM <span>.</span></h6>
            <div class="hot_keywords_head_right">
            </div>
        </div>
        <div class="search_best_item">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($best_items as  $index=>$product)
                    <div class="swiper-slide product-list-wrapper mb-n6">
                        <div class="single-product-list product-hover mb-6">
                            <div class="thumb">
                                <a href="#" class="image">
                                    <img class="first-image"
                                         src="{{$product->first_from_images}}" alt="Product"/>
                                    <img class="second-image"
                                         src="{{$product->second_from_images}}" alt="Product"/>
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
                                            <span class="star" style="width: 100%"></span>
                                        </span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination" style="width: unset"></div>
            </div>
        </div>
    </div>
    <div class="hot_keywords">
        <div class="hot_keywords_head">
            <h6 class="hot_keywords_head_left">PROMOTION <span>.</span></h6>
            <div class="hot_keywords_head_right">
            </div>
        </div>
        <div class="promotion_best_item">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($best_items as  $index=>$product)
                    <div class="swiper-slide">
                        <img src="{{asset('frontend/assets/images/searchpromotiom.jpg')}}" alt="Banner Image">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
