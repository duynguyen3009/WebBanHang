@foreach($items as $key => $value)
    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
        <div class="product">
            @include('news.patirials.product.image', ['pageIndex' => null ,'typeProduct'  => 'sale' ] )
            @include('news.patirials.product.content',['typeProduct'  => 'sale'])
        </div>
    </div>
@endforeach