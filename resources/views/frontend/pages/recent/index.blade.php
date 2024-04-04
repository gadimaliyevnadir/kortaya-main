@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    <!-- @include('frontend.includes.sections.breadcrumb_content', ['title' => 'Recent']) -->
    <section class="section section-margin recent-view-max">
    <div class="">
        <div class="breadcrumb-section-new">
            <p>Home / <span>Recent Viewed</span></p>
        </div>
    </div>
    <div class="section">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <h3 class="recentviewtitle">Recent Viewed Items</h3>
                    <div class="recentviewsCards">
                        @foreach(session()->get('recentView', []) as $recentView)
                            <div class="recentviewsCard">
                                <a href="{{route('frontend.product.detail', ['product' => $recentView['slug']])}}" class="recentviewsCardleft">
                                    <img src="{{$recentView['image']}}" alt="Banner Image" />
                                </a>
                                <div class="recentviewsCardright">
                                    <div class="recentviewsCardrighttop">                                
                                        <div class="recentviewsCardrighttopleft">
                                            <a href="{{route('frontend.product.detail', ['product' => $recentView['slug']])}}">HARUHARUWONDER Black Rice Hyaluronic Anti-wrinkle Serum 50ml</a>
                                            <p class="price_old">${{$recentView['discount_price']}}</p>
                                            <p class="price_new">${{$recentView['price']}}</p>
                                        </div>
                                        <a class="recentviewsCardrighttopright resent_delete_btn" data-url="{{route('frontend.recentViewDelete', ['product' => $recentView['product_id']])}}">
                                            <img src="{{asset('frontend/assets/images/test/close.svg')}}" alt="cardItem">
                                        </a>
                                    </div>
                                    <div class="recentviewsCardrightbottom">
                                        <a class="recentviewsCardrightbottom_cart add_basket_btn" data-url="{{route('frontend.addBasket', ['product' => $recentView['product_id']])}}"
                                           data-combination="{{$recentView['combination_id']}}">Cart</a>
                                        <a class="recentviewsCardrightbottom_buy" href="#">Buy</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
        <div class="row mb-5">
            <div class="col" data-aos="fade-up" data-aos-delay="300">
                <nav class="mt-8 d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                </a>
                            </li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
                    <!-- <div class="wishlist-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
{{--                                <th class="pro-stock">Stock Status</th>--}}
                                <th class="pro-cart">Add to Cart</th>
{{--                                <th class="pro-cart">Buy</th>--}}
                                <th class="pro-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(session()->get('recentView', []) as $recentView)
                                <tr class="basket_content_body">
                                    <td class="pro-thumbnail"><a href="{{route('frontend.product.detail', ['product' => $recentView['slug']])}}">
                                            <img class="img-fluid" src="{{$recentView['image']}}" alt="Product"/></a></td>
                                    <td class="pro-title">
                                        <a href="{{route('frontend.product.detail', ['product' => $recentView['slug']])}}"
                                        >{{$recentView['name']}}</a>
                                    </td>
                                    <td class="pro-price">
                                        <p>{{$recentView['discount_price']}}</p>
                                        <span class="pro-price-discount">{{$recentView['price']}}</span>
                                    </td>
{{--                                    <td class="pro-stock"><span>In Stock</span></td>--}}
                                    <td class="pro-cart">
                                        <a href="" class="btn btn-dark btn-hover-primary rounded-0 add_basket_btn"
                                           data-url="{{route('frontend.addBasket', ['product' => $recentView['product_id']])}}"
                                           data-combination="{{$recentView['combination_id']}}">Add to Cart</a>
                                    </td>
{{--                                    <td class="pro-remove">--}}
{{--                                        <a href="" class="btn btn-dark btn-hover-primary rounded-0 "--}}
{{--                                           data-url="" data-combination="">Buy</a>--}}
{{--                                    </td>--}}
                                    <td class="pro-remove"><a href="#"
                                                              data-url="{{route('frontend.recentViewDelete', ['product' => $recentView['product_id']])}}"
                                        class="resent_delete_btn"><i
                                                class="pe-7s-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('main/resent-view.js')}}"></script>
@endsection
