@php 
    $thumbs  = json_decode($item['thumb']);
@endphp
<div class="col-lg-7 col-md-6">
    <div class="product-single-gallery">
        <div class="product-slider-container product-item">
            <div class="product-single-carousel owl-carousel owl-theme">
                @foreach ($thumbs as $thumb)
                @php 
                    $src    = "uploads/$thumb";
                @endphp
                    <div class="product-item">
                        <img class="product-single-image" style="height: 300px" src="{{ asset($src) }}" data-zoom-image="{{ asset($src) }}"/>
                    </div>
                @endforeach
            </div>
            <span class="prod-full-screen">
                <i class="icon-plus"></i>
            </span>
        </div>
        <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
            @foreach ($thumbs as $thumb)
            @php 
                $src    = "uploads/$thumb";
            @endphp
                <div class="col-3 owl-dot">
                    <img src="{{ asset($src) }}" style="width: 100px; height: 100px"/>
                </div>
            @endforeach
        </div>
    </div><!-- End .product-single-gallery -->
</div><!-- End .col-lg-7 -->