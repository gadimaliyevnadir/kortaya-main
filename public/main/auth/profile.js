$(document).ready(function () {
    $("#update_profile").on('click', function (e) {
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

        if (password !== "" && password_confirmation !== "") {
            form.append('password', password)
            form.append('password_confirmation', password_confirmation)
        }
        form.append('first_name', first_name.val())
        form.append('last_name', last_name.val())
        form.append('email', email.val())

        form.append('id_user', id_user.val())
        form.append('first_name', first_name.val())
        form.append('last_name', last_name.val())
        form.append('english_first_name', english_first_name.val())
        form.append('english_last_name', english_last_name.val())


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

        $('.input-error').text("");
        $.ajax({
            url,
            method: 'POST',
            data: form,
            dataType: 'JSON',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                toastr.success(`${response.message}`);
            },
            error: function (response) {
                const result = response.responseJSON;
                if (typeof result !== 'undefined') {
                    if (typeof result.errors !== 'undefined') {
                        const errors = result.errors;
                        Object.keys(errors).forEach(function (key) {
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
$(document).ready(function () {
    $("#add_address").on('click', function (e) {
        e.preventDefault();
        const form = new FormData();
        const url = $(this).data('url')
        const address_label = $('.address_label')
        const name_recipient = $('.name_recipient')
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
        const set_default = $('.set_default').prop('checked')

        form.append('address_label', address_label.val())
        form.append('name_recipient', name_recipient.val())
        form.append('address_country', address_country.val())

        form.append('address_line_1', address_line_1.val())
        form.append('address_line_2', address_line_2.val())
        form.append('address_city', address_city.val())
        form.append('address_state', address_state.val())
        form.append('address_postal_code', address_postal_code.val())
        form.append('telephone_select_inp_prefix', telephone_select_inp_prefix.val())
        form.append('telephone_select_inp_val', telephone_select_inp_val.val())
        form.append('mobile_telephone_prefix', mobile_telephone_select_inp_prefix.val())
        form.append('mobile_telephone', mobile_telephone_select_inp_val.val())
        form.append('set_default', set_default)

        $('.input-error').text("");
        $.ajax({
            url,
            method: 'POST',
            data: form,
            dataType: 'JSON',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                toastr.success(`${response.message}`);
                if (response.data?.redirect) {
                    window.location.href = response.data.redirect;
                }
            },
            error: function (response) {
                const result = response.responseJSON;
                if (typeof result !== 'undefined') {
                    if (typeof result.errors !== 'undefined') {
                        const errors = result.errors;
                        Object.keys(errors).forEach(function (key) {
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
$(document).ready(function () {
    $(".delete_address").on('click', function (e) {
        e.preventDefault();
        const form = new FormData();
        const url = $(this).data('url')

        const checked_ids = $('.check_inp:checked');
        checked_ids.each(function () {
            form.append(`ids[${$(this).data('id')}]`, $(this).data('id'))
        });
        $.ajax({
            url,
            method: 'POST',
            data: form,
            dataType: 'JSON',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                toastr.success(`${response.message}`);
                document.location.reload()
            },
            error: function (response) {
                const result = response.responseJSON;
                if (typeof result !== 'undefined') {
                    if (typeof result.errors !== 'undefined') {
                        const errors = result.errors;
                        Object.keys(errors).forEach(function (key) {
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

