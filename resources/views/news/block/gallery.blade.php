@php
    $images = \File::allFiles(public_path('storage/files/Images/home-content-top'));
@endphp
<div class="featured-products-section carousel-section">
    <div class="container">
        <h2 class="h3 title mb-4 text-center">Hình ảnh nổi bật</h2>
        <div class="featured-products owl-carousel owl-theme">    
            @foreach($images as $image)
                <div class="product">
                    <figure class="product-image-container">
                        <div class="product-image">
                            <img  src="{{ asset('storage/files/Images/home-content-top/' . $image->getFilename()) }}">
                        </div>
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
</div>