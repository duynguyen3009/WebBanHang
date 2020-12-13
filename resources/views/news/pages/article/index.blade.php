@section('title', 'Bài viết')
@extends('news.main')
@section('content')
<main class="main" style="background-color: #fff">
   @php
         use  App\Helpers\Template  as Template ;
         use  App\Helpers\URL      as URL ;
         $breadcrumArticle = Template::showBreadcrumArticle(['parent_id' => $itemsArticle['parent_id']]) ;
         $link = URL::linkCategoryArticle($itemsArticle['category_id'],$itemsArticle['name']);
   @endphp
       @include('news.pages.article.child-index.breadcrumb')
      <div class="container">   
         <div class="row">
            <div class="col-lg-9">
               <article class="entry single">
                     @if(count($itemsArticle) > 0)
                        @include('news.pages.article.child-index.article', [ 'items' => $itemsArticle ]  )
                     @endif
               </article>
               @if(count($itemsArticle) > 0)
                     @include('news.pages.article.child-index.related',     [ 'items' => $itemsArticle ] )
               @endif
                     
            </div>
            @include('news.elements.right', [
                     'itemsArticleNew' => $itemsArticleNew,
                     'itemsProductNew' => $itemsProductNew,
                     'itemsAgencies'   => $itemsAgencies,
                     'itemsTag'        => $itemsTag,
            ])
         </div>
      </div>
    <div class="mb-6"></div>
 </main>
@endsection