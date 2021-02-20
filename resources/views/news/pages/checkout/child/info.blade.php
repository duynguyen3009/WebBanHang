<div class="col-lg-8 order-lg-first">
    <div class="checkout-payment">
        <h2 class="step-title">Thông tin thanh toán:</h2>

        <div id="new-checkout-address" class="show">
            <form action="#">
                <div class="form-group required-field">
                    <label>Họ và tên </label>
                    <input type="text" class="form-control" name="name" required>
                </div><!-- End .form-group -->

                <div class="form-group required-field">
                    <label>Địa chỉ giao hàng </label>
                    <input type="text" class="form-control" name="address" required>
                </div><!-- End .form-group -->

                <div class="form-group">
                    <label>Số điện thoại </label>
                    <input type="text" class="form-control"name="phone" required>
                </div><!-- End .form-group -->

            </form>
        </div><!-- End #new-checkout-address -->

        
            <a href="#" class="btn btn-primary float-right checkout-last">Đặt hàng</a>
    </div><!-- End .checkout-payment -->

    {{-- <div class="checkout-discount">
        <h4>
            <a data-toggle="collapse" href="#checkout-discount-section" class="collapsed" role="button" aria-expanded="false" aria-controls="checkout-discount-section">Áp dụng mã khuyến mãi</a>
        </h4>

        <div class="collapse" id="checkout-discount-section">
            <form action="#">
                    <input type="text" class="form-control form-control-sm" placeholder="Nhập mã"  required>
                    <button class="btn btn-sm btn-outline-secondary" type="submit">Áp dụng</button>
            </form>
        </div><!-- End .collapse -->
    </div><!-- End .checkout-discount --> --}}
</div><!-- End .col-lg-8 -->