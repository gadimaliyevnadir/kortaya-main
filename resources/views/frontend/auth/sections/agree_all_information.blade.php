<div class="register-wrapper-item pt-5">
    <div class="register-wrapper-item-head d-flex align-items-center justify-content-between">
        <h5 class="fs-5 m-0">Agree all</h5>
    </div>
    <div class="agree_all_box mt-2">
        <div class="agree_all_box_item">
            <p class="agree_all_item_title">Agree to Terms of Use, Privacy Policy (required)</p>
        </div>
        <div class="agree_all_box_item">
            <p class="agree_all_item_title_second">Terms and Conditions (required)</p>
            <div class="agree_all_item_terms">
                {!! settings('terms_and_conditions') !!}
            </div>
            <div class="checkbox_register pt-3 gap-3 d-flex align-items-center justify-content-start check_required_1">
                <p class="m-0">I have read and agree to the user agreement.</p>
                <input id="check_terms" type="checkbox"/>
                <label for="check_terms" class="label_checkbox">Yes</label>
            </div>
        </div>
        <div class="agree_all_box_item">
            <p class="agree_all_item_title_second">Privacy Policy (required)</p>
            <div class="agree_all_item_terms">
                {!! settings('privacy_policy') !!}
            </div>
            <div class="checkbox_register pt-3 gap-3 d-flex align-items-center justify-content-start check_required_2">
                <p class="m-0">I have read and agree to the privacy policy.</p>
                <input id="check_policy" type="checkbox"/>
                <label for="check_policy" class="label_checkbox">Yes</label>
            </div>
        </div>
        <div class="agree_all_box_item">
            <p class="agree_all_item_title_second">Agree to receive shopping information</p>
            <div class="agree_all_item_terms">
                {!! settings('agree_to_receive_shopping_information') !!}
            </div>
            <div class="checkbox_sms_email pt-3 gap-3 d-flex align-items-center justify-content-between check_required_4">
                <p class="m-0">Do you agree to receive SMS?</p>
                <input id="register_sms" type="checkbox"/>
                <label for="register_sms" class="label_checkbox">Accept</label>
            </div>
            <div class="checkbox_sms_email pt-3 gap-3 d-flex align-items-center justify-content-between check_required_5">
                <p class="m-0">Do you agree to receive e-mails?</p>
                <input id="register_email" type="checkbox"/>
                <label for="register_email" class="label_checkbox">Accept</label>
            </div>
            <span class="input-error error-register_sms"></span>
            <span class="input-error error-register_email"></span>
        </div>
    </div>
</div>
