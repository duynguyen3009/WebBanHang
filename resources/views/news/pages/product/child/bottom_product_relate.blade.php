<div class="featured-section">
    <div class="container">
       <h2 class="carousel-title">Sản phẩm liên quan</h2>
       <div class="featured-products owl-carousel owl-theme owl-dots-top">
           @foreach ($itemsFeatured as $value)
          <div class="product">
              @include('news.patirials.product.image' ,   ['pageIndex'    => null , 'typeProduct'  => 'featured']  ) 
              @include('news.patirials.product.content' , ['typeProduct'  => 'featured'] )  
            </div>
            @endforeach
       </div>
    </div>
</div>