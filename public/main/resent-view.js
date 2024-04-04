$(function () {
    const form = new FormData();
    $('.resent_delete_btn').on('click', function (e) {
        e.preventDefault();
        const url = $(this).data('url')
        var deletedItem = $(this).closest(".basket_content_body").clone();
        $(this).closest(".basket_content_body").fadeOut("slow", function() {
            $(this).remove();
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
