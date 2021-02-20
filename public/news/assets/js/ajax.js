$(document).ready(function () {

    // LOAD LOCAL STORAGE ---start
    const INFO_GUEST      = 'INFO_GUEST';
    let contactInfo       = localStorage.getItem(INFO_GUEST);
    let contactInfoObj    = $.parseJSON(contactInfo);
    let nameLocal       = contactInfoObj.name;
    let addressLocal    = contactInfoObj.address;
    let phoneLocal      = contactInfoObj.phone;
    $("input[name = name]").val(nameLocal);
    $("input[name = address]").val(addressLocal);
    $("input[name = phone]").val(phoneLocal);
    // LOAD LOCAL STORAGE ---end

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
        priceOld = 0;
        id                  = $('.id_product').val();
        idPriceProduct      = $('input:hidden[name=id_price_product]').val();
        quantity            = $('.quantity').val();
        price               = $('.price_product').val().slice(0, -4).replace(/,/g, '');
        priceOld            = $('.price_old_product').val().slice(0, -4).replace(/,/g, '');
        name_attribute      = $('input:hidden[name=name_attr]').val();
        value_attribute     = $('input:hidden[name=value_attr]').val();
        id_attribute        =   $('input:hidden[name=id_attr]').val();
        url = $(this).data("url");
        url = url.replace("new_value", id);
        url = url.replace("new_value1", id_attribute);
        url = url.replace("new_value2", quantity);
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_price_product: idPriceProduct,
                quantity: quantity,
                price: price,
                priceOld: priceOld,
            },
            dataType: "json",
            success: function (result) {
                console.log(result);
                let totalQuantity = result.totalQuantity;
                $('.cart-count').html(totalQuantity);
                let message     = result.message;
                $.notify(message, { className: "success", position: "left top" });
                // let totalQuantityCart = parseInt($('.cart-count').html());
                // let totalQuantityCartUpdate = totalQuantityCart + parseInt(quantity);
                // $('.cart-count').html(totalQuantityCartUpdate);
                // if (result.checkId == true) {
                //     let quantityProduct = parseInt($('.quantity-' + product_id).html());
                //     let updateQuantity = quantityProduct + parseInt(result.quantity);
                //     $('.quantity-' + product_id).html(updateQuantity);
                // } else {
                //     $('.cart-product-add').addClass('product-' + product_id);
                //     $('.cart-product-name').html(name);
                //     $('.cart-product-price').html("x " + price);
                //     $('.cart-product-quantity').html(quantity);
                //     $('.cart-product-quantity').addClass('quantity-' + product_id);
                //     $('.cart-product-image').attr("src", thumb);
                //     $('.cart-product-image').attr("alt", name);
                //     $('.btn-remove-product-hover').attr("data-id", product_id);
                //     $('.btn-remove-product-hover').attr("data-url", result.linkDeleteItem);
                //     $('.cart-product-add').removeClass('d-none');
                //     $('.dropdown-cart-products').append($('.cart-product-add'));
                // }
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
   $('.btn-remove').click(function (e) { 
        e.preventDefault();
        let id              = $(this).attr('data-id');
        let id_attribute    = $(this).data("idattr");
        let quantity        = $(this).data("quantity");
        url = $(this).data("url");
        url = url.replace("new_value", id_attribute);
        url = url.replace("new_value", id);
        url = url.replace("new_value", quantity);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result) {
                    console.log(result);
                    $.notify(result.message, { className: "success", position: "left top" });
                    let totalQuantityCart       = parseInt($('.cart-count').html());
                    let totalQuantityCartUpdate = totalQuantityCart - parseInt(result.quantity);
                    $('.cart-count').html(totalQuantityCartUpdate)
                    // $('.product-' + result.productId).remove();
                    $('.item-attr-' + result.idAttr).remove();
                    $('.remove-' + result.productId).remove();
                }
            }
        })
   });

    // TĂNG QUANTITY Ở CHI TIẾT GIỎ HÀNG
    $('.btn-quantity').click(function (e) {
        e.preventDefault();
        let id              = $(this).attr('data-id');
        let quantity        = $(this).val();
        let id_attribute    = $(this).data("idattr");
        let price           = $(this).attr('data-price');
        let amount          = parseInt(quantity * price);
        let amountFormat    = parseInt(quantity * price).toLocaleString() + ' VNĐ';
        $('.total-one-product-' + id_attribute).html(amountFormat  + `<input type="hidden" class="amount" value="${amount}" >`);

        // lấy tổng tiền tất cả sản phẩm và gắn qua form hóa đơn
        // let subTotal = parseInt($('.total-price-all-product').val());
        // let total = 0;
        // $('.amount').each(function () {
        //     total += parseInt($(this).val());
        // })
        // $('.subtotal').html(parseInt(total).toLocaleString() + ' VNĐ' + `<input type="hidden" class="subtotal-hidden" name="subtotal"  value="${parseInt(total)}" >`);


        url = $(this).data("url");
        url = url.replace("new_value", id);
        url = url.replace("new_value", quantity);
        url = url.replace("new_value", id_attribute);
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result) {
                    let quantity    = result.quantity;
                    let message     = result.message;
                    $.notify(message, { className: "success", position: "left top" });
                    // let id = result.productId;
                    // $.notify('Bạn đã thay đổi số lượng sản phẩm - ' + id + ' thành công', { className: "success", position: "left top" });
                    // let quantityProduct = parseInt($('.quantity-' + id).html());
                    // let updateQuantity = quantityProduct - quantityProduct + parseInt(quantity);
                    // $('.quantity-' + id).html(updateQuantity);
                    // let totalQuantityCart = parseInt($('.cart-count').html());
                    // let totalQuantityCartUpdate = parseInt(totalQuantityCart) - parseInt(totalQuantityCart) + parseInt(total);
                    // $('.cart-count').html(totalQuantityCartUpdate)
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
                    let subTotal = $('input:hidden[name=subtotal]').val();
                    let feeShipping = $('input:hidden[name=fee]').val();
                    let totalCheckout = (parseInt(subTotal) + parseInt(feeShipping)).toLocaleString() + ' VNĐ';
                    $('.total-checkout').html(totalCheckout + `<input type="hidden" name="total-checkout" value="${(parseInt(subTotal) + parseInt(feeShipping))}" >`);
                } else {
                    let subTotal = $('input:hidden[name=subtotal]').val();
                    $('.fee').html(0 + ' VNĐ' + `<input type="hidden" class="fee" value="0" >`);
                    $('.total-checkout').html(parseInt(subTotal).toLocaleString() + ' VNĐ' + `<input type="hidden" name="total-checkout" value="${(parseInt(subTotal))}" >`);
                }

            }
        })
    });

    // LẤY GIÁ TRỊ COUPON Ở TRANG CHI TIẾT GIỎ HÀNG
    $('.btn-apply-coupon').click(function (e) {
        e.preventDefault();
        let coupon  = $('.coupon').val();
        url = $(this).data("url");
        url = url.replace("new_value", coupon);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (result) {
                console.log(result);
                if (result == null) {
                    $('.alert-coupon').css("color", "red");
                    $('.alert-coupon').html('Thất bại ! Mã giảm giá không hợp lệ!');
                    $('.coupon').html('0 VNĐ' + `<input type="hidden" class="coupon" value="0" >`);
                } 
                else {
                    $('.alert-coupon').css("color", "#1eff00");
                    $('.alert-coupon').html('Thành công ! Mã giảm giá  hợp lệ!');
                    if (result.type_coupon == 'direct') {
                        let valueCoupon                     = (result.value);
                        let total                           = $("input[name = payment]").val();
                        let totalAfterCheckCoupon           = parseInt(total - valueCoupon);
                        let totalAfterCheckCouponFormat     = parseInt(totalAfterCheckCoupon).toLocaleString() + ' VNĐ';
                        $('.payment').html(totalAfterCheckCouponFormat);
                        $("input[name = payment]").val(totalAfterCheckCoupon);
                    }
                    if (result.type_coupon == 'percent') {
                        let valueCoupon                     = (result.value);
                        let total                           = $("input[name = payment]").val();
                        let totalAfterCheckCoupon           = parseInt(total - (total * valueCoupon)/ 100);
                        let totalAfterCheckCouponFormat     = parseInt(totalAfterCheckCoupon).toLocaleString() + ' VNĐ';
                        $('.payment').html(totalAfterCheckCouponFormat);
                        $("input[name = payment]").val(totalAfterCheckCoupon);
                    }

                }
            }
        })
    });

    // THAY ĐỔI GIÁ Ở TRANG CHI TIẾT SẢN PHẨM
    $('.btn-attribute').click(function (e) {
        e.preventDefault();
        let promotion       = $('input:hidden[name=promotion]').val();
        let valuePromotion  = $('input:hidden[name=value_promotion]').val();
        let nameAttr        = $(this).data("value");
        let idAttr          = $(this).data("id");
        $('input:hidden[name=name_attr]').val(nameAttr);
        $('input:hidden[name=id_attr]').val(idAttr);
        let valueAttr = $(this).data("price");
        if (promotion == 'direct') {
            valueAttr -= valuePromotion;
        }else{
            valueAttr = valueAttr - (valueAttr / valuePromotion);
        }
        $('input:hidden[name=value_attr]').val(valueAttr);
        $( "a.name-attribute" ).each(function( index, element ) {
            $(element).removeAttr('style');
        });
        let id = $(this).data("id");
        $('input:hidden[name=id_price_product]').val(id);
        // $('.attribute-' + id).css("background-color", "#0af30a");
        $('.name-attribute').removeClass('bg-success');
        $('.attribute-' + id).addClass("bg-success");
        
        let price           = $(this).data("price");
        if (promotion == 'direct') {
            price -= valuePromotion;
        }else{
            price = price - (price / valuePromotion);
        }
        $('.product-price-detail').html(price.toLocaleString() + ' VNĐ');
        $(':hidden.price_product').val(price.toLocaleString() + ' VNĐ');
        // console.log(price);
       

    });

    // ĐẶT HÀNG Ở TRANG CHECKOUT
    $('.checkout-last').click(function (e) { 
        e.preventDefault();
        const INFO_GUEST      = 'INFO_GUEST';
        let inputName       =  $("input[name = name]").val();
        let inputAddress    =  $("input[name = address]").val();
        let inputPhone      =  $("input[name = phone]").val();
        let infoObj = {
            name    : inputName,
            address : inputAddress,
            phone   : inputPhone,
        };
        info = JSON.stringify(infoObj);
        localStorage.setItem(INFO_GUEST, info);
        window.location.href = '/dat-hang/maintenance';
    });

    // LOAD LẠI TRANG CHI TIẾT GIỎ HÀNG
    $('.refresh-page').click(function (e) { 
        e.preventDefault();
        location.reload();
    });
}); 

