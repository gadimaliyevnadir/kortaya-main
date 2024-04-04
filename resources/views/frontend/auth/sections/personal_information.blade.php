<div class="register-wrapper-item mb-5">
    <div
        class="border-bottom-own register-wrapper-item-head d-flex align-items-center justify-content-between">
        <h5 class="fs-6 m-0 fw-6">Personal Information</h5>
        <div class="required_wrapped_register">
            <span class="text-primary">*</span> Required Fields
        </div>
    </div>
    <div class="register-wrapper-text m-auto">
        <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
            <div
                class="mt-3 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                Email <span class="text-primary">*</span></div>
            <div
                class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 d-flex align-items-start gap-1 justify-content-start flex-column">
                <input type="email" class="special_register_input email" name="email"/>
                <span class="field_info_msg">Enter your email address to use as login ID.</span>
                <span class="input-error error-email"></span>
            </div>
        </div>
        <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
            <div
                class="mt-3 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                Password <span class="text-primary">*</span></div>
            <div
                class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 d-flex align-items-start gap-1 justify-content-start flex-column">
                <input type="password" class="special_register_input password" />
                <span class="field_info_msg">[A combination of at least three of the following: Upper and lowercase
                                            letters/numbers/special characters (8 to 16 characters)]</span>
                <span class="input-error error-password"></span>
            </div>
        </div>
        <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
            <div
                class="mt-3 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                Confirm Password <span class="text-primary">*</span></div>
            <div
                class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 d-flex align-items-start gap-1 justify-content-start flex-column">
                <input type="password" class="special_register_input password_confirmation" name="password_confirmation"/>
                <span class="input-error error-password"></span>
            </div>
        </div>
        <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
            <div
                class="mt-3 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                English Name <span class="text-primary">*</span></div>
            <div
                class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 flex-row d-flex align-items-start gap-1 justify-content-start">
                <input type="text" name="english_first_name" class="special_register_input english_first_name" placeholder="First name"/>
                <span class="input-error error-english_first_name"></span>
                <input type="text" name="english_last_name" class="special_register_input english_last_name" placeholder="Last name"/>
                <span class="input-error error-english_last_name"></span>
            </div>
        </div>
        <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
            <div
                class="mt-3 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                Address  <span class="text-primary">*</span></div>
            <div
                class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 d-flex align-items-start gap-1 gap-md-3 justify-content-start flex-column">
                <select name="address_country" id="id_address_countries"
                        class="register_class_select address_country">
                    <option value="0">Azerbaijan</option>
                    <option value="1">U.S.A.</option>
                    <option value="2">Etc .</option>
                </select>
                <span class="input-error error-address_country"></span>
                <input type="text" class="special_register_input address_line_1" name="address_line_1" placeholder="Address Line 1"/>
                <span class="input-error error-address_line_1"></span>
                <input type="text" class="special_register_input address_line_2" name="address_line_2" placeholder="Address Line 2"/>
                <span class="input-error error-address_line_2"></span>
                <input type="text" class="special_register_input address_city" name="address_city" placeholder="City"/>
                <span class="input-error error-address_city"></span>
                <input type="text" class="special_register_input address_state" name="address_state" placeholder="State/Province"/>
                <span class="input-error error-address_state"></span>
                <div
                    class="flex-column flex-md-row d-flex align-items-center justify-content-between gap-1 w-410">
                    <input type="text" class="special_register_input postalCode address_postal_code" name="address_postal_code" placeholder="Zip/Postal code"/>
                    <span class="input-error error-address_postal_code"></span>
                    <div
                        class="checkbox_register d-flex align-items-center justify-content-start justify-content-md-center">
                        <input id="check_register" class="address_postal_code_check" name="address_postal_code_check" type="checkbox"/>
                        <label for="check_register" class="label_checkbox">No zip/postal
                            code</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
            <div
                class="mt-5 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                Telephone
            </div>
            <div
                class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 flex-row d-flex align-items-start gap-1 justify-content-start">
                <select name="telephone_select_inp_prefix" id="telephone_select"
                        class="register_class_select telephone_select_inp_prefix">
                    <option value="0">Azerbaijan (+994)</option>
                    <option value="1">U.S.A (+1)</option>
                    <option value="2">Test (+2)</option>
                </select>
                -
                <input type="text" name="telephone_select_inp_val" class="special_register_input telephone_select_inp_val"/>
                <span class="input-error error-telephone_select_inp_val"></span>
            </div>
        </div>
        <div class="w-100 row register-body-item mx-auto flex-column flex-md-row">
            <div
                class="mt-3 mt-md-0 register-body-item-title addAddresNewHeader_title col-12 col-md-3 d-flex align-items-center justify-content-start">
                Mobile Phone <span class="text-primary">*</span>
            </div>
            <div
                class="mt-3 mt-md-0 register-body-item-input col-12 col-md-9 flex-row d-flex align-items-start gap-1 justify-content-start">
                <select name="mobile_telephone_select_inp_prefix" id="mobilephone_select"
                        class="register_class_select mobile_telephone_select_inp_prefix">
                    <option value="0">Azerbaijan (+994)</option>
                    <option value="1">U.S.A (+1)</option>
                    <option value="2">Test (+2)</option>
                </select>
                -
                <input type="text" name="mobile_telephone_select_inp_val" class="special_register_input mobile_telephone_select_inp_val"/>
                <span class="input-error error-mobile_telephone_select_inp_val"></span>
            </div>
        </div>
    </div>
</div>