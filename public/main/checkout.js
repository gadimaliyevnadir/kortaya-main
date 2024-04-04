$(function () {
    const form = new FormData();
    $('.order_save_checkout').on('click', function (e) {
        e.preventDefault();
        const url = $(this).data('url')
        const first_name = $('.first_name');
        const last_name = $('.last_name');
        const company_name = $('.company_name');
        const address_name = $('.address_name');
        const new_address = $('.new_address');
        const email = $('.email');
        const phone = $('.phone');
        const note = $('.note');
        const payment_method = $('.payment_method');

        form.append('first_name', first_name.val())
        form.append('last_name', last_name.val())
        form.append('company_name', company_name.val())
        form.append('address_name', address_name.val())
        form.append('new_address', new_address.val())
        form.append('email', email.val())
        form.append('phone', phone.val())
        form.append('note', note.val())
        form.append('payment_method', payment_method.val())
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
                // toastr.success(`${response.message}`);
                $('#contact-form').find("input, textarea").val("");
                toastr.success('success');
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
                            $(`.error-${key.replaceAll('.', '-')}`).text(errors[key][0])
                        })
                    }
                    // if (result.status !== 422) {
                    //     toastr.error(`${response.message}`);
                    //     // swal.fire("Error!", response.message);
                    // }
                }
            }
        })

    })
})
