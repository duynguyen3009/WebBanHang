@php
   use App\Models\ProductModel;
   use App\Helpers\URL;
   use App\Helpers\Template;
   $productModel        = new ProductModel();
   $linkDeleteProduct   = route('productf/deleteItemCart', ['id' => 'new_value']);
   $linkQuantity        = route('productf/updateQuantity', ['id' => 'new_value', 'quantity' => 'new_value']);
   $cart                = $cart['quantity'];
   $totalHidden         =  0;
@endphp
<div class="col-lg-8">
    <div class="cart-table-container">
       <table class="table table-cart">
          <thead>
             <tr>
                <th class="product-col">Sản phẩm</th>
                <th class="price-col">Giá</th>
                <th class="qty-col">Số lượng</th>
                <th>Tổng tiền</th>
             </tr>
          </thead>
          <tbody>
            @foreach ($cart as $id => $quantity)
               @php
                  $item          = $productModel->getItem($id ,['task' => 'get-product-in-cart']) ;
                  $arrPrice      = Template::showPrice($item);
                  $price         = $arrPrice['price']; // show đúng giá format
                  $priceT        = substr($arrPrice['price'], 0, -4); // custom lại format để nhân ra total
                  $priceT        = str_replace(",", "", $priceT);
                  $id            = $item['id'];
                  $name          = $item['name'];
                  $linkProduct   = URL::linkProduct($id, $name);
                  $thumb         = "uploads/" . json_decode($item['thumb'], true)[0];
                  $total         =  number_format(((int)$priceT * $quantity)) . ' VNĐ';
                  $totalHidden   += (int)$priceT * $quantity;
               @endphp
                  <tr class="product-row product-{{$id}}">
                     <td class="product-col">
                        <figure class="product-image-container">
                           <a href="product.html" class="product-image">
                           <img src="{{ asset($thumb) }}" alt="product" style="height: 100px">
                           </a>
                        </figure>
                        <h2 class="product-title">
                           <a href="product.html">{{ $name }}</a>
                        </h2>
                     </td>
                  <td>{{ $price }}</td>
                     <td>
                     <input class="form-control text-center btn-quantity" data-price={{$priceT}} data-url="{{ $linkQuantity}}" data-id="{{ $id }}" style="width: 80px" type="number" value="{{ $quantity }}">
                     </td>
                  <td class="total-one-product-{{ $id }}">{{ $total }} <input type="hidden" class="amount" value="{{ (int)$priceT * $quantity}}" > 
                     <a href="#" style="color: red" title="Xóa sản phẩm" class="btn-remove remove-product-detail-cart remove-{{$id}}" data-url="{{ $linkDeleteProduct }}" data-id="{{ $id }}"><span class=""></span></a>
                  </td>
                  </tr>
                  
             @endforeach  
             <input type="hidden" value="{{$totalHidden}}" class="total-price-all-product">
               
          </tbody>
          <tfoot>
             <tr>
                <td colspan="4" class="clearfix">
                   <div class="float-left">
                   <a href="{{ route('home')}}" class="btn btn-outline-secondary" style="color: red">Tiếp tục mua sắm</a>
                   </div>
                   <!-- End .float-left -->
                   {{-- <div class="float-right">
                      <a href="#" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                      <a href="#" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</a>
                   </div> --}}
                   <!-- End .float-right -->
                </td>
             </tr>
          </tfoot>
       </table>
    </div>
 </div>
