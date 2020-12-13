<aside class="sidebar col-lg-3">
   <div class="sidebar-wrapper">
         <!-- Bài viết mới nhất-->
        @include('news.elements.child-right.news_new')

         <!-- Sản phẩm mới nhất-->  
         @include('news.elements.child-right.product_new')


         <!-- Chi nhánh-->  
         @include('news.elements.child-right.agencies')

         <!-- Tags-->  
         @include('news.elements.child-right.tags')

         <!-- Thư viện-->  
         @include('news.elements.child-right.library')
   </div><!-- End .sidebar-wrapper -->
</aside><!-- End .col-lg-3 -->