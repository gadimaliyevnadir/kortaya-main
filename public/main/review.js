$(function () {
    const form = new FormData();
    $('.add_review_btn').on('click', function (e) {
        e.preventDefault();
        const url = $(this).data('url')
        const name = $('.name');
        const email = $('.email');
        const comment = $('.comment');
        const product_id = $('.product_id');
        const ratings_review_point = $('.ratings_review_point');

        form.append('name', name.val())
        form.append('email', email.val())
        form.append('comment', comment.val())
        form.append('product_id', product_id.val())
        form.append('ratings_review_point', ratings_review_point.val())
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
                location.reload()
                // $('#contact-form-review').find("input, textarea").val("");
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
            }
        })

    })
})
