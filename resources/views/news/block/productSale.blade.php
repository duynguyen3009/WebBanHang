@if(count($itemsProductSale) > 0)
    <div class="featured-products-section carousel-section">
        <div class="container">
        <h2 class="h3 title mb-4 text-center">Sản phẩm khuyến mãi</h2>
            <div class="featured-products owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1418px;">
                            @foreach($itemsProductSale as $item)
                                <div class="owl-item active" style="width: 225.2px; margin-right: 11px;">
                                    <div class="product">
                                        @include('news.patirials.product.image' ,   ['item' => $item, 'type'  => 'sale'])
                                        @include('news.patirials.product.content' , ['item' => $item, 'type'  => 'sale']) 
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"><i class="icon-left-open-big"></i></button>
                        <button type="button" role="presentation" class="owl-next"><i class="icon-right-open-big"></i></button>
                    </div>
            </div>
        </div>
    </div>     
@endif