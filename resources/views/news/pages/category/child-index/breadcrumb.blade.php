<nav aria-label="breadcrumb" class="breadcrumb-nav">
    @php
    use  App\Helpers\Template  as Template ;
        $breadcrumCategory = Template::showBreadcrumArticle(['parent_id' => $params['category_id']]) ;
    @endphp
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                {!! $breadcrumCategory !!}
        </ol>
    </div><!-- End .container -->
</nav>