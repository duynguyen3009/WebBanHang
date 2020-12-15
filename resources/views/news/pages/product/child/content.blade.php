@php

    use App\Helpers\Template;
    use App\Models\PriceProductModel;
    
    $id                         = $item['id'];
    $name                       = $item['name'];
    $thumb                      = $item['thumb'];
    $linkYoutube                = $item['link'];
    $content                    = mb_substr($item['content'],1, 500);
    $tags                       = $item['tags'];
    $active                     =   null;
    $attributeNamePriceCustom   = $item['attribute_name_price_custom'];

    //XỬ LÝ GIÁ KHI CÓ VÀ KHÔNG CÓ KHUYẾN MÃI

    $arrPrice   = Template::showPrice($item);
    $priceOld   = $arrPrice['priceOld'];
    $price      = $arrPrice['price'];
    
    // SHOW THUỘC TÍNH KHÔNG THAY ĐỔI GIÁ
    if (isset($item['attribute']) && $item['attribute_name_price_custom'] == null) {
        $attributes           =   json_decode($item['attribute'], true);
    }
    // SHOW THUỘC TÍNH CÓ THAY ĐỔI GIÁ
    if (isset($item['price_custom']) && $item['price_custom'] !== null && $item['attribute'] == null) {
        $attrChangePrice            = json_decode($item['price_custom'], true);
        $nameAttr                   = json_decode($attrChangePrice['name'], true);
        $valueAttr                  = json_decode($attrChangePrice['value'], true);
        $resultAttr                 = array_combine($nameAttr, $valueAttr);
    }
@endphp
<div class="col-lg-5 col-md-6">
    <div class="product-single-details">
    <h1 class="product-title">{{ $name }}</h1>
    <input type="hidden" value="{{ $id }}" class="id_product">
    <input type="hidden" value="{{ $name }}" class="name_product">
    <input type="hidden" value="{{ $thumb }}" class="thumb_product">
    <input type="hidden" value="{{ $price }}" class="price_product">
    <input type="hidden" value="{{ $priceOld }}" class="price_old_product">
        <div class="ratings-container">
            <div class="product-ratings">
                <span class="ratings" style="width:100%"></span>
            </div>
            {{-- <a href="#" class="rating-link">( 6 Reviews )</a> --}}
        </div>

        @if ($item['promotion'] == 'default')
            <div class="price-box">
                <span class="product-price">{{ $price }}</span>
            </div>
        @else
            <div class="price-box">
                <span class="old-price">{{ $priceOld }}</span>
                {{-- <span class="product-price">{{ $price }}</span> --}}
            </div>
            <h2 class="product-price-detail" style="color: red; margin-bottom: 15px">{{ $price }}</h2>
        @endif

        {{-- <div class="product-desc">
            {!! $content !!}
        </div><!-- End .product-desc --> --}}

        <div class="product-filters-container">
            <div class="product-single-filter">
                    @php
                        $priceProductModel          = new PriceProductModel();
                        $params['product_id']       = $id;
                        $itemsAttr = $priceProductModel->listItems($params, ['task'=> 'list-item-by-product_id']);
                    @endphp
                <ul class="config-size-list">
                    @foreach ($itemsAttr as $item)
                        <li class="btn-attribute attribute"  data-id="{{$item['id']}}"  data-price="{{$item['price']}}">
                            <a class="attribute-{{$item['id']}} name-attribute" href="#">{{$item['attr_value']}}</a>
                        </li>
                        @endforeach
                        <input type="hidden" name="id_price_product" class="id_price_product" value="">
                    </ul><br>
                {{-- @if (isset($item['price_custom']) && $item['price_custom'] !== null && $item['attribute'] == null)
                    <label>{!! $attributeNamePriceCustom !!}</label>
                    <ul class="config-size-list">
                        @foreach ($resultAttr as $key => $value)
                            <li class="{{ $active }}"><a href="#">{{ $key }}</a></li>
                        @endforeach
                    </ul>
                @elseif(isset($item['attribute']) && $item['attribute_name_price_custom'] == null)
                    @foreach ($attributes as $value)
                        @php
                            $name            = Template::showNameAttribute($value['name']);
                            $arrAtribute     = $value['value'];
                        @endphp
                        <ul class="config-size-list">
                            <li class=""><a href="#">1 gói</a></li>
                            {{-- <label>{!! $name !!}</label>
                                @foreach ($arrAtribute as $key => $value)
                                    <li class="{{ $active }}"><a href="#">{{ $value }}</a></li>
                                @endforeach --}}
                        {{-- </ul><br>
                    @endforeach
                @endif  --}}
               
            </div>
        </div>

        <div class="product-action">
            <div class="product-single-qty">
                <input class="horizontal-quantity form-control quantity" type="text">
            </div><!-- End .product-single-qty -->
            @php
               $linkCart = route($controllerName .'/cart', [
                                'id'                    =>  'new_value',
                                'id_price_product'      =>  'new_value',
                                'quantity'              =>  'new_value',
                                'price'                 =>  'new_value',
                                'priceOld'              =>  'new_value',
                            ]);
            @endphp
            <a href="#" class="paction add-cart" data-url="{{ $linkCart }}" title="Thêm vào giỏ hàng">
                <span>Thêm vào giỏ hàng</span>
            </a>
            
            {{-- <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                <span>Add to Wishlist</span>
            </a> --}}
        </div><!-- End .product-action -->

    </div><!-- End .product-single-details -->
</div><!-- End .col-lg-5 -->