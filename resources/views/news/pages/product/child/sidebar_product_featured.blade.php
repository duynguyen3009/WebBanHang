@php
    use App\Helpers\URL;
@endphp
<div class="widget widget-featured">
    <h3 class="widget-title">Sản phẩm nổi bật</h3>
    <div class="widget-body">
       <div class="owl-carousel widget-featured-products">
          <div class="featured-col">
              @foreach ($itemsFeatured as $item)
              @php
                    $id     = $item['id'] ;
                    $name   = $item['name'] ;
                    $thumb  = "uploads/" . json_decode($item['thumb'])[0];
                    $price  = number_format($item['price']) . ' VNĐ' ;
                    $link   = URL::linkProduct($id, $name);
              @endphp
                  <div class="product product-sm" style="border: 1px solid #ccc; padding: 5px">
                    <figure class="product-image-container">
                        <a href="{{ $link }}" class="product-image" style="width: 80px; height: 80px">
                            <img src="{{ asset($thumb) }}" alt="product" >
                        </a>
                    </figure>
                    <div class="product-details">
                    <h2 class="product-title">
                        <a href="{{ $link }}">{{ $name }}</a>
                    </h2>
                    <div class="price-box">
                        <span class="product-price" style="color: red">{{ $price }}</span>
                    </div>
                    </div>
             </div>
              @endforeach
             
      
          </div>
          <div class="featured-col">
              @foreach ($itemsFeatured as $item)
                @php
                    $thumb  = "uploads/" . json_decode($item['thumb'])[0];
                    $name   = $item['name'] ;
                    $price  = number_format($item['price']) . ' VNĐ' ;
                @endphp
                   <div class="product product-sm" style="border: 1px solid #ccc; padding: 5px">
                        <figure class="product-image-container">
                            <a href="{{ $link }}" class="product-image" style="width: 80px; height: 80px">
                                <img src="{{ asset($thumb) }}" alt="product" >
                            </a>
                        </figure>
                        <div class="product-details">
                            <h2 class="product-title">
                            <a href="{{ $link }}">{{ $name }}</a>
                            </h2>
                            <div class="price-box">
                                {{-- <span class="old-price">$50.00</span> --}}
                            <span class="product-price" style="color: red">{{ $price }}</span>
                            </div>
                        </div>
             </div>
              @endforeach
          </div>
       </div>
    </div>
 </div>