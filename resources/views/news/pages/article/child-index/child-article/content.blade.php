@php 
    $name       = $itemsArticle['name'];
    $content    = $itemsArticle['content'];
    $createdBy  = $itemsArticle['created_by'];
    $created    = $itemsArticle['created'];
@endphp
<h2 class="entry-title">
    {{ $name }}
</h2>

<div class="entry-meta">
    <span><i class="icon-calendar"></i>{{ $created }}</span>
    <span><i class="icon-user"></i>Bởi <a href="#">{{ $createdBy }}</a></span>
</div><!-- End .entry-meta -->

<div class="entry-content">
    {!! $content !!}
</div>