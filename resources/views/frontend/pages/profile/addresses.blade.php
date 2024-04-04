@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    <section class="order_tracking_path">
        <div class="container order_tracking_box">
            <a class="banner_path_links" href="#">
                Home
            </a>
            <a class="banner_path_links" href="#">
                My Account
            </a>
            <a class="banner_path_links" href="#">
                Address Book
            </a>
        </div>
    </section>
    <section class="order_tracking_content">
        <div class="container">
            <h3 class="order_tracking_content_title">Address List</h3>
            <div class="adress_profile_box">
                <table class="table table-bordered checkbox_table">
                    <thead>
                    <tr>
                        <th class="pro-thumbnail checkbox_adress white-space-own">
                            <input id="checkbox_adress_check_all" type="checkbox"/>
                            <label for="checkbox_adress_check_all" class="label_checkbox"></label>
                        </th>
                        <th class="pro-title white-space-own">Address Label</th>
                        <th class="pro-price white-space-own">Recipient</th>
                        <th class="pro-quantity white-space-own">Phone</th>
                        <th class="pro-subtotal white-space-own">Mobile</th>
                        <th class="pro-adress white-space-own">Address</th>
                        <th class="pro-remove white-space-own">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->addresses as $address)
                        <tr class="basket_content_body_98 basket_content_body white-space-own">
                            <td class="adress_alone_check">
                                <input id="checkbox_adress_check_one_{{$address->id}}" data-id="{{$address->id}}"
                                       class="checkbox_adress_check_one check_inp"
                                       type="checkbox"/>
                                <label for="checkbox_adress_check_one_{{$address->id}}" class="label_checkbox"></label>
                            </td>
                            <td>{{$address->address_label}}</td>
                            <td>{{$address->name_recipient}}</td>
                            <td>{{$address->telephone}}</td>
                            <td>{{$address->mobile_telephone}}</td>
                            <td>{{$address->address_state}}</td>
                            <td class="button_link">
                                <a href="{{route('frontend.profile.profileAddressesEdit',['address'=>$address])}}" class="address_link_sublink">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(auth()->user()->addresses->count() < 0)
                <div class="adress_empty">
                    <img class="adress_empty_img" src="{{asset('frontend/assets/images/order_tracking/info.svg')}}"
                         alt="history"/>
                    <p class="adress_empty_text">There is no order history.</p>
                </div>
            @endif
            <div class="buttons_adress_new">
                <a href="#"
                   data-url="{{route('frontend.deleteAddress')}}"
                   class="adress_empty_button delete_address">Delete</a>
                <a href="{{route('frontend.profile.addAddress')}}" class="adress_add">Add</a>
            </div>
            <div class="coupon_list_box adress_box_adress">
                <ul class="order_tracking_date_info">
                    <li class="order_tracking_date_info_item">
                        By default, results are shown for the past three months. You can also view the order history of
                        orders that have been fulfilled over the past 36 months by adjusting the date range.
                    </li>
                    <li class="order_tracking_date_info_item">
                        You can check order history of orders that have been fulfilled over 36 months ago in <a
                            href="#">[Archived
                            Orders]</a> tab.
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{asset('main/auth/profile.js')}}"></script>
@endsection
