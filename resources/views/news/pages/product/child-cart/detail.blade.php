@php

   use App\Models\ProductModel;
   use App\Models\PriceProductModel;
   use App\Helpers\URL;
   use App\Helpers\Template;
   $productModel        = new ProductModel();
   $priceProductModel   = new PriceProductModel();
   $linkDeleteProduct   = route('productf/deleteItemCart', ['id' => 'new_value', 'id_attribute' => 'new_value', 'quantity' =>'new_value']); 
   $linkQuantity        = route('productf/updateQuantity', ['id' => 'new_value', 'id_attribute' => 'new_value', 'quantity' => 'new_value']);
   $cart                = session('cart');
   $total = 0;

@endphp
<div class="col-lg-12">
    <div class="cart-table-container">
            <table class="table table-cart">
               <thead>
                  <tr>
                     <th class="product-col">Sản phẩm</th>
                     <th class="price-col">Thuộc tính</th>
                     <th class="price-col">Giá</th>
                     <th class="qty-col">Số lượng</th>
                     <th>Tổng tiền</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($cart as $idProduct => $items)
                  @php
                     $item          = $productModel->getItem($idProduct ,['task' => 'get-product-in-cart']) ;
                     $name          = $item['name'];
                     $linkProduct   = URL::linkProduct($idProduct, $name);
                     $thumb         = "uploads/" . json_decode($item['thumb'], true)[0];
                  @endphp
                     @if (is_array($items))
                        @foreach ($items as $itemAttr => $itemQuantity)
                           @php
                              $attributes          = $priceProductModel->getItem(['id'=>$itemAttr] ,['task' => 'get-item']) ;
                              $price               = Template::showPricePromotion($item['promotion'], $item['value_promotion'], $attributes['price']);
                              $priceFormat         = Template::showNumberFormatPrice($price);
                              $amount              =  (int)$price * $itemQuantity ;
                              $amountFormat        =  number_format(((int)$price * $itemQuantity)) . ' VNĐ';
                              $total               += $amount;
                              $totalFormat         =  number_format($total) . ' VNĐ';
                              // $linkCheckout        =  route('checkoutnews', ['total' => $total]);
                              $linkCheckout        =  route('checkoutnews');
                              session(['total' => $total]);
                               @endphp
                        <tr class="product-row product-{{$idProduct}} item-attr-{{$itemAttr}}">
                           <td class="product-col">
                              <figure class="product-image-container" >
                                 <a href="product.html" class="product-image">
                                 <img src="{{ asset($thumb) }}" alt="product" >
                                 </a>
                              </figure>
                              <h2 class="product-title">
                                 <a href="product.html">{{ $name }}</a>
                              </h2>
                           </td>
                        <td><span style="color: blueviolet">{{$attributes['attr_value']}}</span></td>
                        <td>{{ $priceFormat }}</td>
                           <td>
                           <input class="form-control text-center btn-quantity" data-price={{$price}} data-url="{{ $linkQuantity}}" data-id="{{ $idProduct }}" data-quantity="{{$itemQuantity}}" data-idAttr="{{$itemAttr}}" style="width: 80px" type="number" value="{{ $itemQuantity }}">
                           </td>
                        <td class="total-one-product-{{ $itemAttr }}">{{ $amountFormat }} 
                           <input type="hidden" class="amount" value="{{ $amount }}" > 
                           <a href="{{ $linkDeleteProduct }}" data-id="{{ $idProduct }}" data-url="{{ $linkDeleteProduct }}" data-idAttr="{{$itemAttr}}" data-quantity="{{$itemQuantity}}" title="Xóa sản phẩm" class="btn-remove" ><span class=""></span></a>
                        </td>
                        </tr>
                        @endforeach
                     @endif
                  @endforeach  
                  
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="4" class="clearfix">
                        <div class="float-left">
                        <a href="{{ route('home')}}" class="btn btn-outline-secondary continue" >Tiếp tục mua sắm</a>
                        </div>
                        <!-- End .float-left -->
                        <div class="float-right">
                           {{-- <a href="#" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a> --}}
                           <a href="#" class="btn btn-outline-secondary btn-clear-cart refresh-page">Cập nhật giỏ hàng</a>
                           <a href="{{ $linkCheckout }}" class="btn btn-outline-secondary btn-update-cart check-out">Tiến hành đặt hàng</a>
                                                </div>
                        <!-- End .float-right -->
                     </td>
                     <td>
                        <span class="total"> {{$totalFormat}}</span>
                        <input type="hidden" value="{{$total}}" class="total">
                        {{-- <span class="refresh-page"><a href="#">Cập nhật</a></span> --}}
                        
                     </td>
                  </tr>
               </tfoot>
         </table>
      
    </div>
 </div>
