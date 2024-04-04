$(document).ready(function () {
    // Обработчик события изменения выбора категории внутри модального окна
    $("#productModal").on('change', '#category_id', function () {
        var categoryId = $(this).val();

        // Отправка AJAX-запроса на сервер
        const form = new FormData();
        const url = $(this).data('url')
        const name = $('.name');
        const brand_id = $('.brand_id');
        if (typeof name.val() !== 'undefined' && name.val() !== null  && name.val() !=='') {
            form.append('name', name.val())
        }
        if (typeof brand_id.val() !== 'undefined' && brand_id.val() !== null  && brand_id.val() !=='') {
            form.append('brand_id', brand_id.val())
        }
        form.append('category_id', categoryId)
        sendAjaxRequest(url, form);
    });
    $("#productModal").on('change', '#brand_id', function () {
        var brand_id = $(this).val();
        // Отправка AJAX-запроса на сервер
        const form = new FormData();
        const url = $(this).data('url')
        const name = $('.name');
        const category_id = $('.category_id');
        if (typeof name.val() !== 'undefined' && name.val() !== null  && name.val() !=='') {
            form.append('name', name.val())
        }
        if (typeof category_id.val() !== 'undefined' && category_id.val() !== null  && category_id.val() !=='') {
            form.append('category_id', category_id.val())
        }
        form.append('brand_id', brand_id)
        sendAjaxRequest(url, form);
    });
    $("#name_inp").keypress(function (e) {
        if (e.which === 13) {
            e.preventDefault();
            const form = new FormData();
            const url = $(this).data('url')
            const name = $('.name');
            form.append('name', name.val())
            sendAjaxRequest(url, form);
        }
    });

    function sendAjaxRequest(url, form) {
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
                $("#some_id").empty();
                $.each(response.data, function (index, product) {
                    var newRow = '<tr class="delete_pr_button_parent">' +
                        '<th scope="row">' + product.id + '</th>' +
                        '<td><img width="25"\n' +
                        'src="' + product.image + '"\n' +
                        '></td>\n' +
                        '<td>' + product.name + '</td>' +
                        '<td>' + product.category_name + '</td>' +
                        '<td>' + product.brand_name + '</td>' +
                        '<td>' + product.price + '<span class="azn"> M</span>' + '</td>' +
                        '<td>' + product.discount_price + '<span class="azn"> M</span>' + '</td>' +
                        '<td><a href="javascript:void(0)" ' +
                        'data-id="' + product.id + '"' +
                        'data-image="' + product.image + '"' +
                        'data-name="' + product.name + '"' +
                        'data-category="' + product.category_name + '"' +
                        'data-brand="' + product.brand_name + '"' +
                        'data-price="' + product.price + '"' +
                        'data-discount="' + product.discount_price + '"' +
                        'class="btn btn-success btn-sm btn_add_to_form delete_pr_button"><i class="fa fa-plus"></i> Əlavə et</a></td>' +
                        '</tr>';
                    $("#some_id").append(newRow);
                });
            },
            error: function (response) {
                const result = response.responseJSON;
                if (typeof result !== 'undefined') {
                    swal.fire("Error!", result.data?.message_error);
                }
            }
        })
    }
});
$(document).on("click", ".btn_add_to_form", function (e) {
    e.preventDefault();
    const id_product = $(this).data('id')
    const image = $(this).data('image')
    const name = $(this).data('name')
    const category = $(this).data('category')
    const brand = $(this).data('brand')
    const price = $(this).data('price')
    const discount = $(this).data('discount')
    if ($('[name="products[' + id_product + ']"]').length > 0) {
        toastr.error('product added');
        return false
    }
    var newRowForm =  '<tr class="delete_pr_button_parent">\n' +
    ' <th>' + id_product + '</th>\n' +
    ' <td><img width="25" src="' + image + '"\n' +
    '          alt="Zoe Schaefer"></td>\n' +
    ' <td>' + name + '</td>\n' +
    ' <td>' + category + '</td>\n' +
    ' <td>' + brand + '</td>\n' +
    ' <td>' + price + ' <span class="azn"> M</span></td>\n' +
    ' <td>' + discount + ' <span class="azn"> M</span></td>\n' +
    ' <td><a href="javascript:void(0)" class="btn btn-danger btn-sm delete_pr_button">Sil <i class="fa fa-trash"></i></a>\n' +
    ' </td>\n' +
    ' <input type="hidden" name="products[' + id_product + ']" value="' + id_product + '">\n' +
    '                                        </tr>'
    $("#exists_products").append(newRowForm);

});
$(document).on("click", ".delete_pr_button", function (e) {
    e.preventDefault();
    $(this).closest(".delete_pr_button_parent").fadeOut("slow", function() {
        $(this).remove();
    });
});
