@php
    use App\Models\ProductModel;
   use App\Helpers\URL;
   use App\Helpers\Template;
   $productModel        = new ProductModel();
   $cart                = $cart['quantity'];
   $total = 0;
   foreach ($cart as $id => $quantity) {
      $item          = $productModel->getItem($id ,['task' => 'get-product-in-cart']) ;
      $arrPrice      = Template::showPrice($item);
      $priceT        = substr($arrPrice['price'], 0, -4); // custom lại format để nhân ra total
      $priceT        = str_replace(",", "", $priceT);
      // $total         =  number_format(((int)$priceT * $quantity)) . ' VNĐ';
      $total         +=  (int)$priceT * $quantity;
   }
@endphp
<div class="col-lg-4">
   <div class="cart-summary">
      <h3>Hóa đơn</h3>
      <h4>
         <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="true" aria-controls="total-estimate-section">Vận chuyển và mã giảm giá</a>
      </h4>
      <div class="collapse" id="total-estimate-section">
         <form action="#">
            @include('news.pages.product.child-cart.total_shipping')
            @include('news.pages.product.child-cart.total_coupon')
         </form>
      </div>
      <!-- End #total-estimate-section -->
      <table class="table table-totals">
         <tbody>
            <tr>
               <td>Tạm tính</td>
            <td class="subtotal">{{ number_format($total) }} VNĐ<input type="hidden" name="subtotal" value="{{ $total}}"></td>
            
            </tr>
            <tr>
               <td>Phí</td>
               <td class="fee">0 VNĐ</td>
            </tr>
            <tr>
               <td>Mã giảm giá</td>
               <td class="coupon">0 VNĐ<input type="hidden" name="coupon" value="0"></td>
            </tr>
         </tbody>
         <tfoot>
            <tr>
               <td>Tổng tiền cần thanh toán</td>
               <td class="total-checkout" style="color: red">{{ number_format($total) }} VNĐ<input type="hidden" name="total-checkout" value="{{ $total}}"></td>
            </tr>
         </tfoot>
      </table>
      <div class="checkout-methods">
         <a href="checkout-shipping.html" class="btn btn-block btn-sm btn-primary">Tiến hành đặt hàng</a>
         {{-- <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a> --}}
      </div>
      <!-- End .checkout-methods -->
   </div>
   <!-- End .cart-summary -->
</div>