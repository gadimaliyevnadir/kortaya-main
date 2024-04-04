$(document).ready(function () {
    $("#register_btn").on('click', function (e) {
        e.preventDefault();
        const form = new FormData();
        const url = $(this).data('url')
        const email = $('.email')
        const password = $('.password')
        const password_confirmation = $('.password_confirmation')
        const id_user = $('.id_user')
        const first_name = $('.first_name')
        const last_name = $('.last_name')
        const english_first_name = $('.english_first_name')
        const english_last_name = $('.english_last_name')
        const address_country = $('.address_country')
        const address_line_1 = $('.address_line_1')
        const address_line_2 = $('.address_line_2')
        const address_city = $('.address_city')
        const address_state = $('.address_state')
        const address_postal_code = $('.address_postal_code')
        const address_postal_code_check = $('.address_postal_code_check').prop('checked')
        const telephone_select_inp_prefix = $('.telephone_select_inp_prefix')
        const telephone_select_inp_val = $('.telephone_select_inp_val')
        const mobile_telephone_select_inp_prefix = $('.mobile_telephone_select_inp_prefix')
        const mobile_telephone_select_inp_val = $('.mobile_telephone_select_inp_val')
        const date_of_birth_day = $('.date_of_birth_day')
        const date_of_birth_month = $('.date_of_birth_month')
        const date_of_birth_year = $('.date_of_birth_year')

        const nickname = $('.nickname')
        const register_gender = $('input[name="register_gender"]:checked').val();
        const date_of_anniversary_day = $('.date_of_anniversary_day')
        const date_of_anniversary_month = $('.date_of_anniversary_month')
        const date_of_anniversary_year = $('.date_of_anniversary_year')
        const get_our_site =  $('input[name="get_our_site"]:checked').val();
        const referrer = $('.referrer')


        form.append('email', email.val())
        form.append('password', password.val())
        form.append('password_confirmation', password_confirmation.val())
        form.append('id_user', id_user.val())
        form.append('first_name', first_name.val())
        form.append('last_name', last_name.val())
        form.append('english_first_name', english_first_name.val())
        form.append('english_last_name', english_last_name.val())
        form.append('address_country', address_country.val())
        form.append('address_line_1', address_line_1.val())
        form.append('address_line_2', address_line_2.val())
        form.append('address_city', address_city.val())
        form.append('address_state', address_state.val())
        form.append('address_postal_code', address_postal_code.val())
        form.append('address_postal_code_check', address_postal_code_check)
        form.append('telephone_select_inp_prefix', telephone_select_inp_prefix.val())
        form.append('telephone_select_inp_val', telephone_select_inp_val.val())
        form.append('mobile_telephone_prefix', mobile_telephone_select_inp_prefix.val())
        form.append('mobile_telephone', mobile_telephone_select_inp_val.val())
        form.append('date_of_birth_day', date_of_birth_day.val())
        form.append('date_of_birth_month', date_of_birth_month.val())
        form.append('date_of_birth_year', date_of_birth_year.val())

        form.append('nickname', nickname.val())
        form.append('register_gender', register_gender)
        form.append('date_of_anniversary_day', date_of_anniversary_day.val())
        form.append('date_of_anniversary_month', date_of_anniversary_month.val())
        form.append('date_of_anniversary_year', date_of_anniversary_year.val())
        form.append('get_our_site', get_our_site)
        form.append('referrer', referrer.val())

        let user_agreement = false;
        if ($('.check_required_1 input[type="checkbox"]').is(':checked')) {
            user_agreement = true;
        } else {
            user_agreement = false;
        }

        if (!user_agreement) {
            swal.fire("You must agree to the user agreement.");
            return false;
        }

        let privacy_policy = false;
        if ($('.check_required_2 input[type="checkbox"]').is(':checked')) {
            privacy_policy = true;
        } else {
            privacy_policy = false;
        }

        if (!privacy_policy) {
            swal.fire("You must agree to the privacy policy.");
            return false;
        }

        form.append('user_agreement', user_agreement);
        form.append('privacy_policy', privacy_policy);

        if ($('.check_required_4 input[type="checkbox"]').is(':checked')) {
            form.append('register_sms', true);
        } else {
            form.append('register_sms', false);
        }

        if ($('.check_required_5 input[type="checkbox"]').is(':checked')) {
            form.append('register_email', true);
        } else {
            form.append('register_email', false);
        }

        $('.input-error').text("");
        $.ajax({
            url,
            method: 'POST',
            data: form,
            dataType: 'JSON',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response)
                toastr.success(response.message);
                setTimeout(function () {
                    showServerSuccess(response);
                }, 2000);
            },
            error: function (response) {
                const result = response.responseJSON;
                if (typeof result !== 'undefined') {
                    if (typeof result.errors !== 'undefined') {
                        const errors = result.errors;
                        Object.keys(errors).forEach(function (key) {
                            // toastr.error(`${response.message}`);
                            // toastr.error(`${errors[key][0]}`);
                            $(`.error-${key.replaceAll('.', '-')}`).text(errors[key][0])
                        })
                    }
                }
                if (result.status !== 'undefined' && result.status === 500) {
                    swal.fire("Error!", result.data?.message_error);
                }
            }
        })
    });
});

