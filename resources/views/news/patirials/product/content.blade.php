@php    
        use App\Helpers\Template  ;
        use App\Helpers\URL  ;
        use App\Helpers\Hightlight  ;
        if ($type == 'search') {
            $arrPrice   = Template::showPrice($item);
            $name       = preg_replace("/".preg_quote($params['search'], "/")."/i", "<span class='highlight' style='background-color:yellow'>$0</span>", $item['name']);
            $price      = $arrPrice['price'];
            $priceOld   = $arrPrice['priceOld'];
            $link       =  URL::linkProduct($item['id'], $item['name']);
        }
        if ($type == 'sale') {
            $arrPrice   = Template::showPrice($item);
            $name       = $item['name'];
            $price      = $arrPrice['price'];
            $priceOld   = $arrPrice['priceOld'];
            $link       =  URL::linkProduct($item['id'], $item['name']);
        }

        if ($type == 'featured'|| $type == 'normal') {
            $arrPrice   = Template::showPrice($item);
            $name       = $item['name'];
            $price      = $arrPrice['price'];
            $priceOld   = $arrPrice['priceOld'];
            $link       =  URL::linkProduct($item['id'], $item['name']);
        }

       
@endphp

@if ($type == 'sale')
    <div class="product-details">
        <h2 class="product-title">
            <a href="{{ $link }}">{{ $name }}</a>
        </h2>
        <div class="price-box">
            <span class="old-price">{{ $priceOld}}</span>
            <span class="product-price">{{ $price}}</span>
        </div>
        <div class="product-action">
            <a href="{{ $link }}" class="paction add-cart" title="Xem chi tiết">
            <span>Xem chi tiết</span>
            </a>
        </div>
    </div>
@elseif($type == 'featured' || $type == 'normal')
    <div class="product-details">
        <h2 class="product-title">
            <a href="{{ $link }}">{{ $name }}</a>
        </h2>
        <div class="price-box">
            <span class="product-price">{{ $price}}</span>
        </div>
        <div class="product-action">
            <a href="{{ $link }}" class="paction add-cart" title="Xem chi tiết">
            <span>Xem chi tiết</span>
            </a>
        </div>
    </div>
@elseif($type == 'search')
<div class="product-details">
    <h2 class="product-title">
        <a href="{{ $link }}">{!! $name !!}</a>
    </h2>
    <div class="price-box">
        <span class="product-price">{{ $price}}</span>
    </div>
    <div class="product-action">
        <a href="{{ $link }}" class="paction add-cart" title="Xem chi tiết">
        <span>Xem chi tiết</span>
        </a>
    </div>
</div>
@endif
