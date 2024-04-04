@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.breadcrumb_content',['title'=>'Checkout'])
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                        <h3 class="title">Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon d-flex">
                                        <input placeholder="Coupon code" type="text">
                                        <input class="btn btn-dark btn-hover-primary rounded-0" value="Apply Coupon"
                                               type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-n4">
                <div class="col-lg-6 col-12 mb-4 px-2">
                    <form action="#">
                        <div class="checkbox-form">
                            <h3 class="title">Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="" class="first_name" name="first_name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder=""  class="last_name" name="last_name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input placeholder="" class="company_name" name="company_name" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="myniceselect country-select clearfix">
                                        <label>Address <span class="required">*</span></label>
                                        <select class="myniceselect nice-select wide rounded-0 address_name" name="address_name">
                                            <option data-display="">yeni adres</option>
                                            @foreach(auth()->user()->addresses as $address)
                                                <option value="{{$address->content}}">{{$address->content}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Adress Line1" class="new_address" name="new_address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Adress Line2" class="new_address" name="new_address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="City" class="new_address" name="new_address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="State/Province" class="new_address" name="new_address" type="text">
                                    </div>
                                </div>
                                <div
                                    class="flex-column flex-md-row d-flex align-items-center mb-4 gap-2 w-410">
                                    <input type="text" class="check_out_special_register_input postalCode address_postal_code" name="address_postal_code" placeholder="Zip/Postal code"/>
                                    <span class="input-error error-address_postal_code"></span>
                                    <div
                                        class="checkbox_register d-flex align-items-center justify-content-start justify-content-md-center">
                                        <input id="check_register" class="address_postal_code_check" name="address_postal_code_check" type="checkbox"/>
                                        <label for="check_register" class="label_checkbox">No zip/postal
                                            code</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" class="email" name="email" type="email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" class="phone">
                                    </div>
                                </div>

                            </div>

                            
                            <div class="order-notes mt-3 mb-n2">
                                <div class="checkout-form-list checkout-form-list-2">
                                    <label>Order Notes</label>
                                    <textarea id="checkout-mess" class="note" name="note" cols="30" rows="10"
                                              placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>

                            <div class="coupon_list_box checkout_page_promocode">
                                <div class="coupon_list_box_first">
                                    <div class="coupon">
                                        <input type="text">
                                    </div>
                                    <button class="coupon_btn go_filter_btn" data-url="http://127.0.0.1:8000/order-tracking">
                                        <a href="#">Add Coupon</a>
                                    </button>
                                </div>
                                <div class="coupon_text">
                                    <p class="coupon_text_content">We only accept the coupons issued by our shopping mall.(Enter 10 ~ 35
                                        digit serial number without dashes.)</p>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-lg-6 col-12 mb-4">

                    <div class="your-order-area border">

                        <h3 class="title">Your order</h3>

                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <thead>
                                <tr class="cart-product-head">
                                    <th class="cart-product-name text-start">Product</th>
                                    <th class="cart-product-total text-end">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php  $subtotal_curd = 0 @endphp
                                @if(auth()->user()?->cart?->infos)
                                    @foreach(auth()->user()?->cart?->infos as  $cart_product)
                                        @php $subtotal_curd += ($cart_product->product->main()->pivot->discount_price * $cart_product->qty) @endphp
                                        <tr class="cart_item">
                                            <td class="cart-product-name text-start ps-0"> {{$cart_product->product->name}}
                                                <strong class="product-quantity"> × {{$cart_product->qty}}</strong></td>
                                            <td class="cart-product-total text-end pe-0"><span
                                                    class="amount">${{$cart_product->product->main()->pivot->discount_price}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>

                                <tfoot>
                                <tr class="cart-subtotal">
                                    <th class="text-start ps-0">Cart Subtotal</th>
                                    <td class="text-end pe-0"><span class="amount">${{$subtotal_curd}}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th class="text-start ps-0">Order Total</th>
                                    <td class="text-end pe-0"><strong><span class="amount">${{$subtotal_curd}}</span></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-accordion-order-button">
                            <!-- <div class="payment-accordion">
                                <div class="col-md-12 mb-2">
                                    <div class="myniceselect country-select clearfix">
                                        <label>Odeniw usulu <span class="required">*</span></label>
                                        <select class="myniceselect nice-select wide rounded-0 payment_method" name="payment_method">
                                            <option data-display="negd" value="1">negd</option>
                                            <option value="2">online</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <div class="order-button-payment">
                                <button class="btn btn-dark btn-hover-primary rounded-0 w-100 order_save_checkout"
                                data-url="{{route('frontend.order.save')}}">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{asset('main/checkout.js')}}"></script>
@endsection
