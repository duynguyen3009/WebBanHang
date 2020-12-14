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
               $link       = URL::linkProduct($item['id'],$item['name']);
            @endphp
            <li style="border: 1px solid #ccc; padding: 5px">
               <div class="entry-media">
                  <a href="{{$link}}">
                        <img src="{{ asset($thumb) }}" alt="Post">
                  </a>
               </div>
               <div class="entry-info">
                  <a href="{{$link}}">{{ $name }}</a>
                  <div class="entry-meta " >
                    <h3 style="color: red"> {{ $price }}</h3>
                  </div>
               </div>
               
            </li>
         @endforeach
      </ul>
 </div>