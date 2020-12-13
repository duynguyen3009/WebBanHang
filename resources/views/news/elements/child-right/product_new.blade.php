@php 
 use App\Helpers\URL;
@endphp
<div class="widget">
      <h4 class="widget-title">Sản phẩm mới nhất</h4>
      <ul class="simple-entry-list">
         @foreach ($itemsProductNew as $item)
            @php
               $name       = substr($item['name'], 0, 25);
               $thumb      = "uploads/" . json_decode($item['thumb'])[0];
               $price      = number_format($item['price']) . ' VNĐ';
               $link       = URL::linkArticle($item['id'],$item['name']);
               $promotion  =  $item['value_promotion'];
               if($item['promotion'] == 'direct'){
                  $classOldPrice = 'old-price';
                  $pricePromotion = number_format($item['price'] - $item['value_promotion']) . ' VNĐ';
               }elseif ($item['promotion'] == 'percent') {
                  $classOldPrice = 'old-price';
                  $pricePromotion = number_format(((100 - $item['value_promotion'])/100) * $item['price']). ' VNĐ';
               }else {
                  $classOldPrice    = null;
                  $pricePromotion   = null;
               }
            @endphp
            <li style="border: 1px solid #ccc; padding: 5px">
               <div class="entry-media">
                  <a href="single.html">
                        <img src="{{ asset($thumb) }}" alt="Post">
                  </a>
               </div><!-- End .entry-media -->
               <div class="entry-info">
               <a href="single.html">{{ $name }}</a>
               <div class="entry-meta {!! $classOldPrice !!}">
                     {{ $price }}
                  </div><!-- End .entry-meta -->
                  <div class="entry-meta" style="color: red">
                     {{ $pricePromotion }}
                  </div><!-- End .entry-meta -->
               </div><!-- End .entry-info -->
            </li>
         @endforeach
      </ul>
 </div><!-- End .widget -->