<div class="featured-section">
    <div class="container">
       <h2 class="carousel-title">Sản phẩm liên quan</h2>
       <div class="featured-products owl-carousel owl-theme owl-dots-top">
           @foreach ($itemsFeatured as $item)
          <div class="product">
              @include('news.patirials.product.image' ,   ['item'=> $item , 'type'  => 'featured']  ) 
              @include('news.patirials.product.content' , ['item'=> $item , 'type'  => 'featured'] )  
            </div>
            @endforeach
       </div>
    </div>
</div>