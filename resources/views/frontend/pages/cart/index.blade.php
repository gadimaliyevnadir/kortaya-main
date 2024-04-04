@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.breadcrumb_content', ['title' => 'Shopping Cart'])
    <div class="section section-margin max-cards">
        <div class="container row">
            <div class="col-md-8 col-12 px-3 px-md-0">
                <div class="cart_items_header">
                    <h3>Cart Items</h3>
                    <img src="{{asset('frontend/assets/images/test/downcard.svg')}}" alt="cardItem" />
                </div>
                <div class="card_content">
                    <div class="card_content_title">
                        <p class="card_content_title_text">Total <span>3</span> Item(s)</p>
                        <button class="card_content_title_btn">Empty Cart</button>
                    </div>
                    <div class="card_item_box">
                        <div class="card_item_box_item">
                            <div class="cart_item_top">
                                <div class="card_item_box_item_left">
                                    <div class="card_item_box_item_img">
                                        <div class="selected_checkbox">
                                            <label for="cart1">
                                                <img class="unchecked" src="{{asset('frontend/assets/images/test/checkbox_off.svg')}}" alt="">
                                                <img class="checked" src="{{asset('frontend/assets/images/test/checkbox_on.svg')}}" alt="">
                                            </label>
                                            <input type="checkbox" name="test" id="cart1" class="cart_common"/>
                                        </div>
                                        <img class="card_item_box_item_main_img" src="{{asset('frontend/assets/images/product-1-1.png')}}" alt="" />
                                        <img class="card_item_box_item_heart_img" src="{{asset('frontend/assets/images/heart.svg')}}" alt="" />
                                    </div>
                                    <div class="card_item_box_item_text">
                                        <p class="card_item_box_item_text_content">COSRX Salicylic Acid Daily Gentle Cleanser 150ml</p>
                                        <p class="card_item_box_item_text_price"><span>$</span>6.99</p>
                                    </div>
                                </div>
                                <div class="card_item_box_item_right">
                                    <!-- <img src="{{asset('frontend/assets/images/test/cancelcards.svg')}}" alt="cardItem" /> -->
                                    <img src="{{asset('frontend/assets/images/test/close.svg')}}" alt="cardItem" />
                                </div>
                            </div>
                            <div class="cart_item_bottom">
                                <div class="cart_item_bottom_quntity">
                                    <div class="minus_cart_bottom"><i class="fa fa-minus"></i></div>
                                    <input class="quantity_cart_bottom" readonly value="2" />
                                    <div class="plus_cart_bottom"><i class="fa fa-plus"></i></div>
                                </div>
                                <button class="cart_item_bottom_quntity_buy shipping_modal">buy</button>
                            </div>
                            <div class="cart-total-price">
                                <p class="cart-total-price-text">Total $ <span>13.98</span></p>
                            </div>
                        </div>
                        <div class="card_item_box_item">
                            <div class="cart_item_top">
                                <div class="card_item_box_item_left">
                                    <div class="card_item_box_item_img">
                                        <div class="selected_checkbox">
                                            <label for="cart2">
                                                <img class="unchecked" src="{{asset('frontend/assets/images/test/checkbox_off.svg')}}" alt="">
                                                <img class="checked" src="{{asset('frontend/assets/images/test/checkbox_on.svg')}}" alt="">
                                            </label>
                                            <input type="checkbox" name="test" id="cart2" class="cart_common" />
                                        </div>
                                        <img class="card_item_box_item_main_img" src="{{asset('frontend/assets/images/product-1-1.png')}}" alt="" />
                                        <img class="card_item_box_item_heart_img" src="{{asset('frontend/assets/images/heart.svg')}}" alt="" />
                                    </div>
                                    <div class="card_item_box_item_text">
                                        <p class="card_item_box_item_text_content">COSRX Salicylic Acid Daily Gentle Cleanser 150ml</p>
                                        <p class="card_item_box_item_text_price"><span>$</span>6.99</p>
                                    </div>
                                </div>
                                <div class="card_item_box_item_right">
                                    <!-- <img src="{{asset('frontend/assets/images/test/cancelcards.svg')}}" alt="cardItem" /> -->
                                    <img src="{{asset('frontend/assets/images/test/close.svg')}}" alt="cardItem" />
                                </div>
                            </div>
                            <div class="cart_item_bottom">
                                <div class="cart_item_bottom_quntity">
                                    <div class="minus_cart_bottom"><i class="fa fa-minus"></i></div>
                                    <input class="quantity_cart_bottom" readonly value="2" />
                                    <div class="plus_cart_bottom"><i class="fa fa-plus"></i></div>
                                </div>
                                <button class="cart_item_bottom_quntity_buy shipping_modal">buy</button>
                            </div>
                            <div class="cart-total-price">
                                <p class="cart-total-price-text">Total $ <span>13.98</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="carts_extra_buttons">
                        <div>
                            <button class="extra_buttons_item">Empty Cart</button>
                            <button class="extra_buttons_item mx-2" id="removeSelected">Delete Selected</button>
                        </div>
                        <button class="extra_buttons_item">Check WishList</button>
                    </div>
                </div>
            </div>
           <!-- <div class="row cart_container">
           <div class="row col-8 cart_table">
                <div class="col-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php  $subtotal = 0@endphp
                                 @if(auth()->check())
                                @if(auth()->user()?->cart?->infos)
                                    @foreach(auth()->user()?->cart?->infos as $cart_product)
                                        @php $subtotal += ($cart_product->product->main()->pivot->discount_price * $cart_product->qty) @endphp
                                        <tr class="basket_content_body_{{$cart_product->product_id}} basket_content_body">
                                            <td class="pro-thumbnail"><a href="{{route('frontend.product.detail', ['product' => $cart_product->product])}}"><img
                                                        class="img-fluid" src="{{$cart_product->product->first_image}}"
                                                        alt="Product" /></a></td>
                                            <td class="pro-title"><a href="{{route('frontend.product.detail', ['product' => $cart_product->product])}}">{{$cart_product->product->name}}</a></td>
                                            <td class="pro-price"><span>${{$cart_product->product->main()->pivot->discount_price}}</span></td>
                                            <td class="pro-quantity">
                                                <div class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box sebet"
                                                               data-url="{{route('frontend.incrementDecrementBasket', ['product' => $cart_product->product_id])}}"
                                                               data-parent="basket_content_body_{{$cart_product->product_id}}"
                                                               data-id="{{$cart_product->product_id}}"
                                                               data-combination="{{$cart_product->combination_id}}"
                                                               value="{{$cart_product->qty}}"
                                                               type="text">
                                                        <div class="dec qtybutton "><i class="fa fa-minus"></i></div>
                                                        <div class="inc qtybutton "><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span class="total_price_product_{{$cart_product->product_id}}">${{$cart_product->qty * $cart_product->product->main()->pivot->discount_price }}</span></td>
                                            <td class="pro-remove"><a href="#" class="delete_button"
                                                                      data-url="{{route('frontend.deleteItemBasket', ['product' => $cart_product->product_id])}}"
                                                ><i class="pe-7s-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            @else
                                @foreach(session()->get('carts', []) as $cart_product)
                                    @php $subtotal += ($cart_product['discount_price'] * $cart_product['quantity']) @endphp
                                    <tr class="basket_content_body_{{$cart_product['product_id']}} basket_content_body">
                                        <td class="pro-thumbnail"><a href="{{route('frontend.product.detail', ['product' => $cart_product['slug']])}}"><img
                                                    class="img-fluid" src="{{$cart_product['image']}}"
                                                    alt="Product" /></a></td>
                                        <td class="pro-title"><a href="{{route('frontend.product.detail', ['product' => $cart_product['slug']])}}">{{$cart_product['name']}}</a></td>
                                        <td class="pro-price"><span>${{$cart_product['discount_price']}}</span></td>
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box sebet"
                                                           data-url="{{route('frontend.incrementDecrementBasket', $cart_product['product_id'])}}"
                                                           data-combination="{{$cart_product['combination_id']}}"
                                                           data-parent="basket_content_body_{{$cart_product['product_id']}}"
                                                           data-id="{{$cart_product['product_id']}}"
                                                           value="{{ $cart_product['quantity']}}"
                                                           type="text">
                                         
                                                    <div class="dec qtybutton "><i class="fa fa-minus"></i></div>
                                                    <div class="inc qtybutton "><i class="fa fa-plus"></i></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span class="total_price_product_{{$cart_product['product_id']}}">${{$cart_product['quantity'] * $cart_product['discount_price']}}</span></td>
                                        <td class="pro-remove"><a href="#" class="delete_button"
                                                                  data-url="{{route('frontend.deleteItemBasket', ['product' => $cart_product['product_id']])}}"
                                            ><i class="pe-7s-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="btn btn-dark btn-hover-primary rounded-0">Apply Coupon</button>
                            </form>
                        </div>
{{--                        <div class="cart-update mt-sm-16">--}}
{{--                            <a href="#" class="btn btn-dark btn-hover-primary rounded-0">Update Cart</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div> -->

            <div class="row cart_total col-4 px-3 px-md-0">
                <div>
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3 class="title">Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="subtotal_span">${{$subtotal}}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$15</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount total_amount_val">${{$subtotal - 15}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="{{route('frontend.checkout')}}" class="btn btn-dark btn-hover-primary rounded-0 w-100 shipping_modal">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('main/basket.js')}}"></script>
@endsection
