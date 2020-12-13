@php    
        use App\Helpers\Template  ;
        use App\Helpers\URL  ;
        $id         = $value['id'] ;
        $name      = $value['name'] ;
        $price     = number_format($value['price'])." VNĐ" ;
        $priceOld  = null;
     
        if($typeProduct == 'sale' && ($value['promotion'] != null) ){
            $priceOld   = $price ;
            $price      = Template::NewsGetPricePromotion($value) ;
        }
        $link = URL::linkProduct($id, $name);
      
@endphp

<div class="product-details">
    {{-- <div class="ratings-container">
        <div class="product-ratings">
        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
        </div>
    </div> --}}
    <h2 class="product-title">
        <a href="{{ $link }}">{{ $name }}</a>
    </h2>
    <div class="price-box">
        <span class="old-price">{{ $priceOld }}</span>
        <span class="product-price">{{ $price }}</span>
    </div>
    <div class="product-action">
        {{-- <a href="#" class="paction add-wishlist" title="Add to Wishlist">
        <span>Add to Wishlist</span>
        </a> --}}
        <a href="{{ $link }}" class="paction add-cart" title="Xem chi tiết">
        <span>Xem chi tiết</span>
        </a>
        {{-- <a href="#" class="paction add-compare" title="Add to Compare">
        <span>Add to Compare</span>
        </a> --}}
    </div>
</div>