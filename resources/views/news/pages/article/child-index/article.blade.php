<article class="entry single">
    @include('news.pages.article.child-index.child-article.image')
    <div class="entry-body">
        <div class="entry-date">
            <span class="day">Bài viết</span>
        </div>
        @include('news.pages.article.child-index.child-article.content')
        @include('news.pages.article.child-index.child-article.feedback')
        @include('news.pages.article.child-index.child-article.comment')
        {{-- @include('news.pages.article.child-index.child-article.share') --}}
    </div>
</article>


