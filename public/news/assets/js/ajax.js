$(document).ready(function () {

    // ADD EMAIL VAO TABLE SUBSCRIBE
    $('.btn-subscribe').click(function (e) {
        e.preventDefault();
        subscribe = $("input[name = subscribe]").val();
        url = $(this).data("url");
        url = url.replace("new_value", subscribe);
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                $(".alert-success").text(result.message);
                $("input[name = subscribe]").val("");
            }
        })
    });

    // SORT - TRANG DANH SÁCH SẢN PHẨM
    $('.btn-sort').on("change", function () {
        element = $(this).val();
        let url = $(this).data("url").replace("new_value", element);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            success: function (result) {
                $('.product-list').html(result);
            }
        })
    });

    // THÊM VÀO GIỎ HÀNG
    $('.add-cart').click(function (e) {
        e.preventDefault();
        id = $('.id_product').val();
        quantity = $('.quantity').val();
        price = $('.price_product').val().slice(0, -4).replace(/,/g, '');
        priceOld = $('.price_old_product').val().slice(0, -4).replace(/,/g, '');
        url = $(this).data("url");
        url = url.replace("new_value", id);
        url = url.replace("new_value", quantity);
        url = url.replace("new_value", price);
        url = url.replace("new_value", priceOld);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                console.log(result);
                let message = result.message;
                let quantity = result.quantity;
                let name = result.name;
                let price = result.price;
                let product_id = result.product_id;
                let thumb = result.thumb;
                $.notify(message, { className: "success", position: "left top" });
                let totalQuantityCart = parseInt($('.cart-count').html());
                let totalQuantityCartUpdate = totalQuantityCart + parseInt(quantity);
                $('.cart-count').html(totalQuantityCartUpdate);
                if (result.checkId == true) {
                    let quantityProduct = parseInt($('.quantity-' + product_id).html());
                    let updateQuantity = quantityProduct + parseInt(result.quantity);
                    $('.quantity-' + product_id).html(updateQuantity);
                } else {
                    $('.cart-product-add').addClass('product-' + product_id);
                    $('.cart-product-name').html(name);
                    $('.cart-product-price').html("x " + price);
                    $('.cart-product-quantity').html(quantity);
                    $('.cart-product-quantity').addClass('quantity-' + product_id);
                    $('.cart-product-image').attr("src", thumb);
                    $('.cart-product-image').attr("alt", name);
                    $('.btn-remove-product-hover').attr("data-id", product_id);
                    $('.btn-remove-product-hover').attr("data-url", result.linkDeleteItem);
                    $('.cart-product-add').removeClass('d-none');
                    $('.dropdown-cart-products').append($('.cart-product-add'));
                }
            }
        })
    });

    // XÓA SẢN PHẨM KHI HOVER VÀO BIỂU TƯỢNG GIỎ HÀNG
    $('.remove-product-hover').click(function (e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        url = $(this).data("url");
        url = url.replace("new_value", id);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result) {
                    // console.log(result);
                    $.notify('Đã xóa sản phẩm', "success");
                    let totalQuantityCart = parseInt($('.cart-count').html());
                    let totalQuantityCartUpdate = totalQuantityCart - parseInt(result.productQuantity);
                    $('.cart-count').html(totalQuantityCartUpdate)
                    $('.product-' + result.productId).remove();

                }

            }
        })
    });

    // XÓA SẢN PHẨM TRANG CHI TIẾT GIỎ HÀNG
    $('.remove-product-detail-cart').click(function (e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        url = $(this).data("url");
        url = url.replace("new_value", id);
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result) {
                    console.log(result);
                    $.notify('Đã xóa sản phẩm', "success");
                    let totalQuantityCart = parseInt($('.cart-count').html());
                    let totalQuantityCartUpdate = totalQuantityCart - parseInt(result.productQuantity);
                    $('.cart-count').html(totalQuantityCartUpdate)
                    $('.product-' + result.productId).remove();
                    $('.remove-' + result.productId).remove();
                }

            }
        })
    });

    // TĂNG QUANTITY Ở CHI TIẾT GIỎ HÀNG
    $('.btn-quantity').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let quantity = $(this).val();
        let price = $(this).attr('data-price');
        let amount = parseInt(quantity * price).toLocaleString();
        $('.total-one-product-' + id).html(amount + ' VNĐ' + `<input type="hidden" class="amount" value="${parseInt(quantity * price)}" >`);

        // lấy tổng tiền tất cả sản phẩm và gắn qua form hóa đơn
        let subTotal = parseInt($('.total-price-all-product').val());
        let total = 0;
        $('.amount').each(function () {
            total += parseInt($(this).val());
        })
        $('.subtotal').html(parseInt(total).toLocaleString() + ' VNĐ' + `<input type="hidden" class="subtotal-hidden" name="subtotal"  value="${parseInt(total)}" >`);


        url = $(this).data("url");
        url = url.replace("new_value", id);
        url = url.replace("new_value", quantity);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result) {
                    let total = 0;
                    $.each(result.cart.quantity, function (index, value) {
                        total += parseInt(value);
                    });
                    let quantity = result.productQuantity;
                    let id = result.productId;
                    $.notify('Bạn đã thay đổi số lượng sản phẩm - ' + id + ' thành công', { className: "success", position: "left top" });
                    let quantityProduct = parseInt($('.quantity-' + id).html());
                    let updateQuantity = quantityProduct - quantityProduct + parseInt(quantity);
                    $('.quantity-' + id).html(updateQuantity);
                    let totalQuantityCart = parseInt($('.cart-count').html());
                    let totalQuantityCartUpdate = parseInt(totalQuantityCart) - parseInt(totalQuantityCart) + parseInt(total);
                    $('.cart-count').html(totalQuantityCartUpdate)
                }

            }
        })
    });

    // LẤY GIÁ SHIPPING TỪ SELECTBOX
    $('.shipping').change(function (e) {
        e.preventDefault();
        id = $(this).val();
        url = $(this).data("url");
        url = url.replace("new_value", id);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result != null) {
                    let fee = parseInt(result.price).toLocaleString() + ' VNĐ';
                    $('.fee').html(fee + `<input type="hidden" name="fee" value="${parseInt(result.price)}" >`);
                    let subTotal    = $('input:hidden[name=subtotal]').val();
                    let feeShipping = $('input:hidden[name=fee]').val();
                    let totalCheckout = (parseInt(subTotal) + parseInt(feeShipping)).toLocaleString() + ' VNĐ';
                    $('.total-checkout').html(totalCheckout + `<input type="hidden" name="total-checkout" value="${(parseInt(subTotal) + parseInt(feeShipping))}" >`);
                } else {
                    let subTotal    = $('input:hidden[name=subtotal]').val();
                    $('.fee').html(0 + ' VNĐ'+ `<input type="hidden" class="fee" value="0" >`);
                    $('.total-checkout').html(parseInt(subTotal).toLocaleString() + ' VNĐ' + `<input type="hidden" name="total-checkout" value="${(parseInt(subTotal))}" >`);
                }

            }
        })
    });

    // LẤY GIÁ TRỊ COUPON Ở TRANG CHI TIẾT GIỎ HÀNG
    $('.btn-apply-coupon').click(function (e) { 
        e.preventDefault();
        let coupon  = $('.coupon').val();
        url         = $(this).data("url");
        url         = url.replace("new_value", coupon);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result == null) {
                    $('.alert-coupon').html('Thất bại ! Mã giảm giá không hợp lệ!');
                    $('.coupon').html('0 VNĐ' + `<input type="hidden" class="coupon" value="0" >`);
                }else{
                    $('.alert-coupon').html('Thành công ! Mã giảm giá  hợp lệ!');
                    console.log(result.type_coupon);
                    if (result.type_coupon == 'direct') {
                        let priceCoupon = (result.value);
                        $('.coupon').html(priceCoupon.toLocaleString() + ' VNĐ' + `<input type="hidden" class="coupon" value="${priceCoupon}" >`);
                    }
                    if (result.type_coupon == 'percent') {
                        totalCheckout = $('input:hidden[name=total-checkout]').val();
                        let priceCoupon = parseInt((result.value) * totalCheckout) / 100;
                        $('.coupon').html(priceCoupon.toLocaleString() + ' VNĐ' + `<input type="hidden" class="coupon" value="${priceCoupon}" >`);
                    }
                   
                }
            }
        })
    });
}); 
