
@section('title', 'Giỏ hàng')
@extends('news.main')
@section('content')
<main class="main" style="background-color: #fff">
    @include('news.pages.product.child-cart.breadcrumb')
   <div class="container" style="margin-top: 20px">
      @if (count($cart['quantity']) > 0)
         <div class="row">
            @include('news.pages.product.child-cart.detail')
            @include('news.pages.product.child-cart.total')
         </div>
      @else
         <div class="row">
           <h3>Chưa có sản phẩm !</h3>
         </div>
      @endif
      
   </div>
   <div class="mb-6"></div>
</main>
@endsection