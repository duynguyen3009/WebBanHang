<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
          {!! $breadcrumArticle !!}<li class="breadcrumb-item"><a href="{{ $link }}">{{ $itemsArticle['category_name'] }}</a></li><li class="breadcrumb-item">{{ $itemsArticle['name'] }}</li>
       </ol>
    </div>
    <!-- End .container -->
 </nav>