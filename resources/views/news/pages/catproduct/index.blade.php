
@section('title', 'Sản phẩm')
@extends('news.main')
@section('content')
    <main class="main" style="background-color: #fff">
        @php
            use  App\Helpers\Template  as Template ;
            $breadcrumCategory = Template::showBreadcrumProduct(['parent_id' => $params['id']]) ;
        @endphp
            @include('news.pages.catproduct.child.breadcrumb')
        <div class="container">
            @include('news.pages.catproduct.child.sort')
            <div class="row row-sm product-list">
                @foreach($items as $item)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product">
                            @include('news.patirials.product.image', ['item' => $item ,'type'  => 'sale' ] )
                            @include('news.patirials.product.content',['item' => $item ,'type'  => 'sale' ])
                        </div>
                    </div>
                @endforeach
            </div>    
            @if (count($items) > 0)
                <nav class="toolbox toolbox-pagination">
                    @include('news.templates.pagination')
                </nav>  
            @endif
        </div>

        <div class="mb-5"></div>
    </main>
@endsection






{{-- <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
    <div class="product">
        <figure class="product-image-container">
            <a href="product.html" class="product-image">
                <img src="assets/images/products/product-2.jpg" alt="product">
            </a>
            <a href="ajax/product-quick-view.html" class="btn-quickview">Quickview</a>
            <span class="product-label label-sale">-20%</span>
            <span class="product-label label-hot">New</span>
        </figure>
        <div class="product-details">
            <div class="ratings-container">
                <div class="product-ratings">
                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                </div><!-- End .product-ratings -->
            </div><!-- End .product-container -->
            <h2 class="product-title">
                <a href="product.html">Zippered Jacket</a>
            </h2>
            <div class="price-box">
                <span class="old-price">$60.00</span>
                <span class="product-price">$48.00</span>
            </div><!-- End .price-box -->

            <div class="product-action">
                <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                    <span>Add to Wishlist</span>
                </a>
                
                <a href="product.html" class="paction add-cart" title="Add to Cart">
                    <span>Add to Cart</span>
                </a>

                <a href="#" class="paction add-compare" title="Add to Compare">
                    <span>Add to Compare</span>
                </a>
            </div><!-- End .product-action -->
        </div><!-- End .product-details -->
    </div><!-- End .product -->
</div><!-- End .col-lg-3 --> --}}

{{-- <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
    <div class="product">
        <figure class="product-image-container">
            <a href="product.html" class="product-image">
                <img src="assets/images/products/product-6.jpg" alt="product">
            </a>
            <a href="ajax/product-quick-view.html" class="btn-quickview">Quickview</a>
            <span class="product-label label-hot">Hot</span>
        </figure>
        <div class="product-details">
            <div class="ratings-container">
                <div class="product-ratings">
                    <span class="ratings" style="width:40%"></span><!-- End .ratings -->
                </div><!-- End .product-ratings -->
            </div><!-- End .product-container -->
            <h2 class="product-title">
                <a href="product.html">Cotton Sweatshirt</a>
            </h2>
            <div class="price-box">
                <span class="product-price">$67.00</span>
            </div><!-- End .price-box -->

            <div class="product-action">
                <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                    <span>Add to Wishlist</span>
                </a>
                
                <a href="product.html" class="paction add-cart" title="Add to Cart">
                    <span>Add to Cart</span>
                </a>

                <a href="#" class="paction add-compare" title="Add to Compare">
                    <span>Add to Compare</span>
                </a>
            </div><!-- End .product-action -->
        </div><!-- End .product-details -->
    </div><!-- End .product -->
</div><!-- End .col-lg-3 --> --}}