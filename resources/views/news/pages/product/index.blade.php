<style>
   #attribute-product {
      background: blue;
      color: white;
      width: 100px; 
      border-radius: 5px;
   }
   #attribute-product:hover {
      background: #0af30a;
   }
</style>
@section('title', 'Chi tiết sản phẩm')
@extends('news.main')
@section('content')
<main class="main">
   <main class="main" style="background-color: #fff">
      @include('news.pages.product.child.breadcrumb')
      <div class="container">
         <div class="row" style="margin-top: 20px">
            <div class="col-lg-9">
               <div class="product-single-container product-single-default">
                  <div class="row">
                     @include('news.pages.product.child.image')
                     @include('news.pages.product.child.content')
                  </div>
               </div>
               <div class="product-single-tabs">
                  @include('news.pages.product.child.tab_title')
                  @include('news.pages.product.child.tab_content')
               </div>
            </div>
            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
            <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
               <div class="sidebar-wrapper">
                  @include('news.pages.product.child.sidebar_info')
                  {{-- @include('news.pages.product.child.sidebar_video') --}}
                  @include('news.pages.product.child.sidebar_product_featured')
               </div>
            </aside>
         </div>
      </div>
      @include('news.pages.product.child.bottom_product_relate')
   </main>
</main>
@endsection