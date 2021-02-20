@php
    $totalFormat = number_format(session('total'));
    $linkCoupon = route("productf/getCoupon", ['coupon' => 'new_value']);
@endphp
<div class="col-lg-4">
    <div class="checkout-info-box">
        <h3 class="step-title">Tổng tiền quý khách cần thanh toán:
        </h3>
        <span class="payment">{{$totalFormat}} VND</span>
        <input type="hidden" name="payment" value="{{$total}}">
    </div><!-- End .checkout-info-box -->

    <div class="checkout-discount">
        <h4>
            <a data-toggle="collapse" href="#checkout-discount-section" class="collapsed" role="button" aria-expanded="false" aria-controls="checkout-discount-section">Áp dụng mã khuyến mãi</a>
        </h4>
        <span class="alert-coupon" ></span>
        <div class="collapse" id="checkout-discount-section">
            <form action="#">
                    <input type="text" class="form-control form-control-sm coupon" placeholder="Nhập mã"  required>
                    
                    <button class="btn btn-sm btn-outline-secondary btn-apply-coupon" type="button" data-url="{{ $linkCoupon }}">Áp dụng</button>
            </form>
        </div><!-- End .collapse -->
    </div><!-- End .checkout-discount -->
</div><!-- End .col-lg-4 -->