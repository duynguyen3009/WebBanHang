@php
   use App\Models\ProductModel;
   use App\Helpers\URL;
   use App\Helpers\Template;
   $productModel = new ProductModel();
   $linkDeleteProduct = route('productf/deleteItemCart', ['id' => 'new_value']);
   $linkCart   = route('productf/detailCart');
   $totalQuantity      = 0;
   // dd(session('cart'));
   // $cart          =  isset(session('cart')) ? session('cart') : null;
   $totalQuantity    = Template::countTotalQuantity(session('cart'));
   
@endphp
{{-- <div class="dropdown-cart-action">
   <a href="{{ $linkCart }}" class="btn">Xem chi tiết giỏ hàng</a>
</div> --}}
<div class="dropdown cart-dropdown">
   <a href="{{ $linkCart }}" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
   <span class="cart-count">{{ $totalQuantity }}</span>
   </a>
   <div class="message-cart"></div>
   <div class="dropdown-menu" >
      <div class="dropdownmenu-wrapper">
         {{-- <div class="dropdown-cart-products">
            @foreach ($cart as $id => $quantity)
            @php
               $item          = $productModel->getItem($id ,['task' => 'get-product-in-cart']) ;
               $arrPrice      = Template::showPrice($item);
               $price         = $arrPrice['price'];
               $id            = $item['id'];
               $name          = $item['name'];
               $linkProduct   = URL::linkProduct($id, $name);
               $thumb         = "uploads/" . json_decode($item['thumb'], true)[0];
            @endphp
            <div class="product-{{$id}} product">
               <div class="product-details">
                  <h4 class="product-title">
                     <a href="{{ $linkProduct }}">{{ $name }}</a>
                  </h4>
                  <span class="cart-product-info">
                  <span class="cart-product-qty quantity-{{ $id }}">{{ $quantity }}</span>
                  <span class="cart-product-price">x {{ $price }}</span> 
                  </span>
               </div>
               <figure class="product-image-container">
                  <a href="{{ $linkProduct }}" class="product-image">
                  <img src="{{ asset($thumb) }}" alt="{{ $name }}">
                  </a>
                  <a href="#" class="btn-remove remove-product-hover" data-url="{{$linkDeleteProduct}}" data-id="{{ $id }}" title="Xóa sản phẩm"><i class="icon-cancel"></i></a>
               </figure>
            </div>
            @endforeach
         </div> --}}
        
         <!-- End .dropdown-cart-total -->
            <div class="dropdown-cart-action">
               <a href="{{ $linkCart }}" class="btn">Xem chi tiết giỏ hàng</a>
            </div>
           
      </div>
   </div>
</div>





 <div class="cart-product-add product d-none">
   <div class="product-details">
      <h4 class="product-title">
      <a href="#" class="cart-product-name"></a>
      </h4>
      <span class="cart-product-info ">
      
      <span class="cart-product-qty cart-product-quantity">0</span>
     <span class="cart-product-price">0</span>
      </span>
   </div>
   <figure class="product-image-container">
      <a href="#" class="product-image">
      <img class="cart-product-image" src="" alt="Cá ba đuôi Ngọc Trai Nữ Hoàng">
      </a>
      
   <a href="#" class="btn-remove remove-product-hover btn-remove-product-hover" data-url="http://guppy.demo.xyz/product/new_value" data-id="43" title="Xóa sản phẩm"><i class="icon-cancel"></i></a>
   </figure>
</div>