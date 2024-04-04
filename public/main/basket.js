$(document).ready(function () {
    $(".qtybutton").on('click', function (e) {
        e.preventDefault();
        const form = new FormData();
        var $button = $(this);
        const url = $button.parent().find('input').data('url');
        const combination = $button.parent().find('input').data('combination');
        const parent_class = $button.parent().find('input').data('parent');
        const total_price_product_id = $button.parent().find('input').data('id');
        form.append('combination', combination)
        if ($button.hasClass('inc')) {
            form.append('type', 'increment')
        } else {
            form.append('type', 'decrement')
        }
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
                $(".cart_icon").text(`${response.data?.count}`);
                $(".subtotal_span").text(`${response.data?.subtotal}`);
                $(".total_amount_val").text(`${response.data?.total}`);
                $(`.total_price_product_${total_price_product_id}`).text(`${response.data?.total_price_product}`);
                toastr.success(`${response.message}`);
                console.log(response.data?.delete)
                if (response.data?.delete === true) {
                    $(`.${parent_class}`).fadeOut("slow", function () {
                        $(this).remove();
                    });
                }
            },
            error: function (response) {
                const result = response.responseJSON;
                if (typeof result !== 'undefined') {
                    swal.fire("Error!", result.data?.message_error);
                }
            }
        })
    });
});
