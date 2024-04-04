@extends('frontend.layouts.master')
@section('header')
@include('frontend.includes.header')
@endsection
@section('content')
@include('frontend.includes.sections.breadcrumb_content',['title'=>'Shop Grid Sidebar'])
<div class="section section-margin">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12 col-custom">
                <div class="shop_toolbar_wrapper flex-column flex-md-row mb-10">
                    <div class="shop-top-bar-left mb-md-0 mb-2">
                        <div class="shop-top-show">
                            <span>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{
                                $products->total() }} results</span>
                        </div>
                    </div>
                    <div class="shop-top-bar-right">

                        <div class="shop-short-by mr-4">
                            <form action="{{ route('frontend.searchPage') }}" method="get">
                                <select class="nice-select" aria-label=".form-select-sm example"
                                    onchange="this.form.submit()" name="sort_by">
                                    <option value="0" selected>Short by Default</option>
                                    <option value="1" @if(request()->has('sort_by') && request()->get('sort_by') == '1')
                                        selected @endif >
                                        Ən yenilər
                                    </option>
                                    <option value="2" @if(request()->has('sort_by') && request()->get('sort_by') == '2')
                                        selected @endif >
                                        Ən kohneler
                                    </option>
                                </select>
                            </form>
                        </div>
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-4" title="Grid"><i
                                    class="fa fa-th"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                    class="fa fa-th-list"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row shop_wrapper grid_3">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 product" data-aos="fade-up" data-aos-delay="200">
                        <div class="prdList__item">
                            <div class="thumbnail">
                                <a href="{{route('frontend.product.detail',['product'=>$product->slug])}}"><img
                                        src="{{$product->first_from_images}}"
                                        id="eListPrdImage179_1" alt="COSRX Advanced Snail 96 Mucin Power Essence 100ml"
                                        loading="lazy"></a>
                                <div class="likeButton "><button type="button"> <strong></strong></button></div>
                                <div class="badge"><span></span></div>
                                <div class="icon__box">
                                    <span class="wish like_btn"
                                          data-url="{{route('frontend.like',['product'=>$product])}}"
                                    ><img
                                            src="//img.echosting.cafe24.com/design/skin/admin/ko_KR/btn_wish_before.png"
                                            class="icon_img ec-product-listwishicon" alt="Before add to wish list"
                                        >WISH</span>
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
                                    <span class="brdName">{{$product->name}}</span><a
                                        href="/product/cosrx-advanced-snail-96-mucin-power-essence-100ml/179/category/311/display/1/"
                                        class=" title_a" style=""><span style="font-size:13px;color:#000000;">{{translation($product)->title}}</span></a>
                                </div>
                                <ul class="xans-element- xans-product xans-product-listitem spec priceB">
                                    <!-- <li class=" upper_title xans-record-">
                                        <strong
                                            class="title displaynone">
                                        </strong> <span
                                            style="font-size:16px;color:#2d7dec;font-weight:bold;">{{$product->name}}</span>
                                    </li> -->
                                    <li class=" sub_title xans-record-">
                                        <strong
                                            class="title ">
                                        </strong> <span style="font-size:12px;color:#3507eb; font-weight: 400;">2026-08-06 ~</span>
                                    </li>
                                    <li class=" sub_title xans-record-">
                                        <strong
                                            class="title displaynone">
                                        </strong> <span style="font-size:12px;color:#555555; font-weight: 400;">{{translation($product)->title}}</span>
                                    </li>
                                    <li class=" sub_title xans-record-">
                                        <strong
                                            class="title displaynone">
                                        </strong> <span
                                            style="font-size:12px;color:#555555;text-decoration:line-through;">${{$product->main()->pivot->price}}</span>
                                    </li>
                                    <li class=" sub_title xans-record-">
                                        <strong
                                            class="title displaynone">
                                        </strong> <span
                                            style="font-size:18px;color:#2d7dec;font-weight:bold;">${{$product->main()->pivot->discount_price}}</span><span
                                            id="span_product_tax_type_text" style=""> </span>
                                    </li>
                                </ul>
                                <div class="bg_recommend" style="background:#ff4545">Recommend</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @include('frontend.layouts.pagination',['items'=>$products])
            </div>
            @include('frontend.pages.search.sections.search_form')
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('main/filter.js')}}"></script>
@endsection
