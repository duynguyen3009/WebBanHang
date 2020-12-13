<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <article class="entry">
                @if(count($itemsArticleInCategory) > 0) 
                        @foreach($itemsArticleInCategory as $item)
                            @include('news.patirials.article.image'   , ['items' => $item])
                            @include('news.patirials.article.content' , ['items' => $item])
                        @endforeach
                @endif
            </article><!-- End .entry -->
        </div>
        @include('news.elements.right')
    </div>
</div>  
<div class="mb-6"></div><!-- margin -->