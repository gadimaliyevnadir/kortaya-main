$(document).on("click", ".delete_order_button", function (e) {
    e.preventDefault();
    var deletedItem = $(this).closest(".basket_content_body").clone();
    $(this).closest(".basket_content_body").fadeOut("slow", function () {
        $(this).remove();
    });
    const form = new FormData();
    const url = $(this).data('url')
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
            deletedItem.appendTo(".basket_text_pad");
            if (typeof result !== 'undefined') {
                swal.fire("Error!", "Server error", "error");
            }
        }
    })
});
$(document).on("click", ".data_change_input_active", function (e) {
    const date_val = $(this).data('date')
    $(".data_change_input_active_value").val(date_val);
});
$(document).on("click", ".data_change_input_failed", function (e) {
    const date_val = $(this).data('date')
    $(".data_change_input_failed_value").val(date_val);
});

