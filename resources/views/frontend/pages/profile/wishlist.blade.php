@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.breadcrumb_content',['title'=>'Wishlist'])
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wishlist-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-stock">Stock Status</th>
                                <th class="pro-cart">Add to Cart</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlists as $product)
                            <tr>
                                <td class="pro-thumbnail"><a href="#">
                                        <img class="img-fluid" src="{{$product->first_image}}"
                                             alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">{{$product->name}}
{{--                                        <br> s / green</a>--}}
                                </td>
                                <td class="pro-price"><span>{{$product->price}}</span></td>
                                <td class="pro-stock"><span>In Stock</span></td>
                                <td class="pro-cart">
                                    <a href="" class="btn btn-dark btn-hover-primary rounded-0 add_basket_btn"
                                       data-url="{{route('frontend.addBasket',['product'=>$product])}}"
                                       data-combination="{{$product->main()->pivot->id}}"
                                    >Add to Cart</a></td>
                                <td class="pro-remove"><a href="#"
                                                          data-url="{{route('frontend.like',['product'=>$product])}}"
                                                          class="remove_btn like_btn"><i class="pe-7s-trash"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.remove_btn').on('click', function(e) {
                $(this).closest('tr').fadeOut();
            });
        });
    </script>
@endsection
