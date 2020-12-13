@php
   $linkCoupon = route("$controllerName/getCoupon", ['coupon' => 'new_value']);
@endphp
<div class="cart-discount">
    <h4 style="padding: 10px 10px">Mã giảm giá</h4>
    <form action="#">
       <div class="input-group">
          <input type="text" class="form-control form-control-sm coupon" placeholder="Nhập mã giảm giá" >
          <div class="input-group-append">
          <button class="btn btn-sm btn-primary btn-apply-coupon" data-url="{{ $linkCoupon }}" type="button">Áp dụng</button>
          </div>
       </div>
       <span class="alert-coupon" style="color:royalblue "></span>

       <!-- End .input-group -->
    </form>
</div>