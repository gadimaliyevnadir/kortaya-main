// general error logic, after ajax form submit been processed;


const addBasketBtns = document.querySelectorAll('.add_basket_btn');
const cartOverlay = document.querySelector('.cart-offcanvas-wrapper');

if(addBasketBtns) {
     addBasketBtns.forEach(btn => btn.addEventListener('click', () => {
         cartOverlay.classList.add('open')
     }))
}
function showServerError(response) {
    if (response.status == 422) {
        let r = response.responseJSON ?? JSON.parse(response.responseText);
        for ([field, value] of Object.entries(r.errors)) {
            let dotI = field.indexOf(".");
            if (dotI != -1) {
                field = field.slice(0, dotI);
            }
            let errorText = "";
            let errorElement = $(`.input-error[data-input=${field}]`);
            errorElement = errorElement.length
                ? errorElement
                : $(`.input-error[data-input="${field}[]"]`);
            errorElement = errorElement.length
                ? errorElement
                : $(`[name=${field}]`).closest(".form-group").find(".input-error");
            errorElement = errorElement.length
                ? errorElement
                : $(`[name="${field}[]"]`).closest(".form-group").find(".input-error");
            for (const [key, error] of Object.entries(value)) {
                errorText = errorText ? errorText + "<br>" + error : error;
            }
            errorElement.html(errorText);
        }
    } else {
        swal.fire("Error!", "Server error", "error");
    }
}

// general success logic, after ajax form submit been processed
function showServerSuccess(response) {
    console.log("response success", response);
    console.log("success", response.success);
    console.log("data", response.data);
    console.log("redirect", response.data?.redirect);
    if (response.success) {
        if (response.data?.redirect) {
            window.location.href = response.data.redirect;
        } else if (response.message) {
            // Toast.fire({
            //     icon: "success",
            //     title: response.message,
            // });
        }
    } else {
        swal.fire("Error!", response.message, "error");
    }
}


if (document.querySelector('.copy_link')) {
    document.querySelector('.copy_link').addEventListener("click", function (e) {
        e.preventDefault();
        const url = $(this).data("url");
        navigator.clipboard.writeText(url).then(
            function () {
                swal.fire({
                    text:
                        "Link  copied. \n",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                });
            },
            function () {
                console.log("Copy error");
            }
        );
    });
}

$(function () {
    const form = new FormData();
    $('.like_btn').on('click', function (e) {
        e.preventDefault();
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
                if (response.success) {
                    if (response.data?.redirect) {
                        window.location.href = response.data.redirect;
                    }else {
                        toastr[response.data?.change_fill ? 'success' : 'error'](response.message);
                    }
                }
            },
            error: function () {
                toastr.error('Unauthenticated');
            }
        })

    })
})
$(function () {
    const form = new FormData();
    $('.subscribe_form_btn').on('click', function (e) {
        e.preventDefault();
        const url = $(this).data('url')
        const email = $('.email_subscribe');
        if (email.val() == "") {
            toastr.error('Enter your email');
            return false;
        } else {
            form.append('email', email.val())
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
                    $('.email_subscribe').val("");
                },
                error: function (response) {
                    const result = response.responseJSON;
                    if (typeof result !== 'undefined') {
                        if (typeof result.errors !== 'undefined') {
                            const errors = result.errors;
                            Object.keys(errors).forEach(function (key) {
                                toastr.error(`${errors[key][0]}`);
                                // $(`.error-${key.replaceAll('.', '-')}`).text(errors[key][0])
                            })
                        }
                        // if (result.status !== 422) {
                        //     // toastr.error(`${response.message}`);
                        //     swal.fire("Error!", response.message);
                        // }
                    }
                }
            })
        }
    })
})
$(document).ready(function () {
    $(".add_basket_btn").on('click', function (e) {
        e.preventDefault();
        const form = new FormData();
        const url = $(this).data('url')
        const combination = $(this).data('combination')
        form.append('combination', combination)
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
              
                if (response.data?.check === true) {
                    var addedItem = $(`<div class="cart-product-wrapper mb-6 basket_content_body ">
                        <div class="single-cart-product">
                            <div class="cart-product-thumb">
                                <a href=""><img src="${response.data?.product.image}"
                                                alt="Cart Product"></a>
                            </div>
                            <div class="cart-product-content">
                                <h3 class="title"><a href="">${response.data?.product.name}</a></h3>
                                <span class="price">
                                    <span class="new">${response.data?.product.discount}</span>
                                    <span class="old">${response.data?.product.price}</span>
                                </span>
                            </div>
                        </div>
                    </div>`);

                    addedItem.appendTo(".basket_text_pad");
                }
            },
            error: function (response) {
                const result = response.responseJSON;
                if (typeof result !== 'undefined') {
                    // swal.fire("Error!", "Server error", "error");
                    swal.fire("Error!", result.data?.message_error);
                }
            }
        })
    });
});
$(document).on("click", ".delete_button", function (e) {
    e.preventDefault();
    var deletedItem = $(this).closest(".basket_content_body").clone();
    $(this).closest(".basket_content_body").fadeOut("slow", function() {
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
            $(".cart_icon").text(`${response.data?.count}`);
            $(".subtotal_span").text(`${response.data?.subtotal}`);
            $(".total_amount_val").text(`${response.data?.total}`);
           
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

// $(document).on("click", ".add_from_popup", function (e) {
//     const popupNameProductVal = $('#popupNameProduct').val();
//
//     if (popupNameProductVal == 0) {
//         $('#popupNameProduct').val('1');
//     }
// });


$(document).ready(function () {
    $(".get_popup_data_product").on('click', function (e) {
        const form = new FormData();
        const url = $(this).data('url')
        const combination = $(this).data('combination')
        form.append('combination', combination)
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
                console.log(response.data)
                if (response.data && response.data.images) {

                    var images = '';
                    $.each(response.data.images, function(index, image) {
                        images += '<a class="swiper-slide" href="#"><img src="' + image.document + '" alt="Image ' + index + '" /> </a>';
                    });
                    $('#popupImageContainer').html(images);

                    $('#popupNameProduct').text(response.data.name);

                    $('#popupDiscountPrice').text(response.data.discount_price);

                    var popupNameProduct = '<del >' + response.data.price + '</del>'
                    $('#popupPrice').html(popupNameProduct);

                    $('#popupSku').text('SKU:' + response.data.sku);

                    $('#popupContent').text( response.data.content);
                    $('#popupQtyProduct').val( response.data.qty_cart);

                    $('#popupQtyProduct').attr('data-url', response.data.qtybutton_url);
                    $('#popupQtyProduct').attr('data-combination', response.data.combination_id);

                    $('#popupAddBasket').attr('data-url', response.data.add_basket_url);
                    $('#popupAddBasket').attr('data-combination', response.data.combination_id);

                    $('#popupLikeBtn').attr('data-url', response.data.like_url);

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

$(".qtybutton").on('click', function (e) {
    var $button = $(this);
    if ($button.parent().find('input').hasClass('sebet')) {
        return false;
    }
    e.preventDefault();
    const form = new FormData();
    const url = $button.parent().find('input').data('url');
    const combination = $button.parent().find('input').data('combination');
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
            toastr.success(`${response.message}`);
        },
        error: function (response) {
            const result = response.responseJSON;
            if (typeof result !== 'undefined') {
                swal.fire("Error!", result.data?.message_error);
            }
        }
    })
});
