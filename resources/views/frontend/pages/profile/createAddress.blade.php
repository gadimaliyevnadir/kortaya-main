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
        <div class="register-wrapper-item mb-5">
            <div
                class="addAddresNewHeader border-bottom-own register-wrapper-item-head d-flex align-items-center justify-content-between">
                <h5 class="fs-5 m-0">Address Book</h5>
            </div>
            <div class="register-wrapper-text m-auto">
                <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
                    <div
                        class="mt-3 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                        <p>Address Label</p>
                    </div>
                    <div
                        class=" mt-3 mt-md-0 register-body-item-input col-12 col-md-9 d-flex align-items-start gap-3 justify-content-start flex-column">
                        <input type="text" value="{{isset($address) ? $address->address_label : ''}}" class="special_register_input address_label"
                               name="address_label">
                        <span class="input-error error-email"></span>
                    </div>
                </div>
                <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
                    <div
                        class="register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                        <p>Name(Recipient)</p>
                    </div>
                    <div
                        class=" mt-3 mt-md-0 register-body-item-input col-12 col-md-9 d-flex align-items-start gap-3 justify-content-start flex-column">
                        <input type="text" class="special_register_input name_recipient"
                               value="{{isset($address) ? $address->name_recipient : ''}}"
                               name="name_recipient"
                            placeholder="First name" />
                        <span class="input-error error-email"></span>
                    </div>
                </div>
                <div class="w-100 mt-3 mt-md-0 row register-body-item mx-auto flex-column flex-md-row">
                    <div
                        class="register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                        <p>Address</p>
                    </div>
                    <div
                        class="register-body-item-input col-12 col-md-9 d-flex align-items-start gap-1 gap-md-3 justify-content-start flex-column">
                        <select name="address_country" id="id_address_countries"
                            class="register_class_select address_country mt-3 mt-md-0 ">
                            <option @if(isset($address) && $address->address_country == '0' ) selected @endif value="0">Azerbaijan</option>
                            <option @if(isset($address) && $address->address_country == '1' ) selected @endif  value="1">U.S.A.</option>
                            <option @if(isset($address) && $address->address_country == '2' ) selected @endif  value="2">Etc .</option>
                        </select>
                        <span class="input-error error-address_country"></span>
                        <input type="text" class="special_register_input address_line_1"
                               value="{{isset($address) ? $address->address_line_1 : ''}}"
                               name="address_line_1"
                            placeholder="Address Line 1">
                        <span class="input-error error-address_line_1"></span>
                        <input type="text" class="special_register_input address_line_2"
                               value="{{isset($address) ? $address->address_line_2 : ''}}"
                               name="address_line_2"
                            placeholder="Address Line 2">
                        <span class="input-error error-address_line_2"></span>
                        <input type="text" class="special_register_input address_city"
                               value="{{isset($address) ? $address->address_city : ''}}"
                               name="address_city"
                            placeholder="City">
                        <span class="input-error error-address_city"></span>
                        <input type="text" class="special_register_input address_state"
                               value="{{isset($address) ? $address->address_state : ''}}"
                               name="address_state"
                            placeholder="State/Province">
                        <span class="input-error error-address_state"></span>

                        <div
                            class="flex-column flex-md-row d-flex align-items-center justify-content-between gap-3 w-410">
                            <input type="text" class="special_register_input postalCode address_postal_code"
                                   value="{{isset($address) ? $address->address_postal_code : ''}}"
                                name="address_postal_code" placeholder="Zip/Postal code">
                            <span class="input-error error-address_postal_code"></span>
                            <div class="checkbox_register d-flex align-items-center justify-content-center">
                                <input id="check_register" class="address_postal_code_check"
                                    name="address_postal_code_check" type="checkbox">
                                <label for="check_register" class="label_checkbox">No zip/postal
                                    code</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100 row register-body-item mx-auto">
                    <div
                        class="register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                        <p>Telephone</p>
                    </div>
                    <div
                        class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 d-flex align-items-start gap-1 gap-md-3 justify-content-start flex-row">
                        <select name="telephone_select_inp_prefix" id="telephone_select"
                            class="register_class_select telephone_select_inp_prefix">
                            <option @if(isset($address) && $address->telephone_prefix == '(+994)' ) selected @endif
                            value="0">Azerbaijan (+994)</option>
                            <option
                                @if(isset($address) && $address->telephone_prefix == '(+994)' ) selected @endif
                                value="1">U.S.A (+1)</option>
                            <option
                                @if(isset($address) && $address->telephone_prefix == '(+994)' ) selected @endif
                                value="2">Test (+2)</option>
                        </select>
                        <input type="text" name="telephone_select_inp_val"
                               value="{{isset($address) ? $address->telephone : ''}}"
                            class="special_register_input telephone_select_inp_val">
                        <span class="input-error error-telephone_select_inp_val"></span>
                    </div>
                </div>
                <div class="w-100 mt-3 mt-md-0 row register-body-item mx-auto">
                    <div
                        class="mt-3 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                        <p>Mobile Phone</p>
                    </div>
                    <div
                        class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 d-flex align-items-start gap-1 gap-md-3 justify-content-start flex-row">
                        <select name="mobile_telephone_select_inp_prefix" id="mobilephone_select"
                            class="register_class_select mobile_telephone_select_inp_prefix">
                            <option  @if(isset($address) && $address->mobile_telephone_prefix == '(+994)' ) selected @endif
                            value="(+994)">Azerbaijan (+994)</option>
                            <option
                                @if(isset($address) && $address->mobile_telephone_prefix == '(+1)' ) selected @endif
                                value="(+1)">U.S.A (+1)</option>
                            <option
                                @if(isset($address) && $address->mobile_telephone_prefix == '(+2)' ) selected @endif
                                value="(+2)">Test (+2)</option>
                        </select>
                        <input type="text" name="mobile_telephone_select_inp_val"
                               value="{{isset($address) ? $address->mobile_telephone : ''}}"
                            class="special_register_input mobile_telephone_select_inp_val">
                        <span class="input-error error-mobile_telephone_select_inp_val"></span>
                    </div>
                </div>
                <div class="mt-3 mt-md-0 w-100 row register-body-item mx-auto">
                    <div
                        class=" mt-3 mb-0 mb-md-3 col-12 d-flex align-items-center justify-content-end">
                        <div class="checkbox_register d-flex align-items-center justify-content-end justify-content-md-center">
                            <input id="check_address" class=" set_default" name="set_default"
                                type="checkbox">
                            <label for="check_address" class="label_checkbox"> Set as default shipping address</label>
                        </div>
                    </div>
                </div>
                <div class="w-100 my-3 my-md-0 row register-body-item mx-auto">
                    <div
                        class="register-body-item-input col-12 py-3 flex-column flex-md-row d-flex align-items-start gap-3 justify-content-end">
                        <div class="checkbox_register d-flex align-items-center justify-content-center">
                            <div class="buttons_adress_new">
                                <a href="{{route('frontend.profile.addresses')}}" class="adress_empty_button">Cancel</a>
                                @if(isset($address))
                                    <a href="#" class="adress_add"
                                       data-url="{{route('frontend.profileAddressesUpdate',['address'=>$address])}}"
                                       id="add_address"
                                    >Update</a>
                                @else
                                    <a href="#" class="adress_add"
                                       data-url="{{route('frontend.newAddress')}}"
                                       id="add_address"
                                    >Save</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="address_title">
            <h5>About Address Book</h5>
        </div>
        <div class="coupon_list_box adress_box_adress">
            <ul class="order_tracking_date_info">
                <li class="order_tracking_date_info_item">
                    You can add up to 50 addresses. Your address book will be automatically updated with the shipping
                    address entered in your latest order, unless the addresses are manually added.
                </li>
                <li class="order_tracking_date_info_item">
                    If you do not want an automatic update, go to "Address Book" and change your auto update setting to
                    "Fixed."
                </li>
                <li class="order_tracking_date_info_item">
                    To set a default shipping address, find the shipping address you want to make your primary and click
                    "Edit". Check "Save as my default shipping address", then click "Save".
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('main/auth/profile.js')}}"></script>
@endsection
