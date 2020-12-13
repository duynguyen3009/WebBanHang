@php
    $thumb      = "images/article/" . $itemsArticle['thumb'];
 @endphp
<div class="entry-media">
    <div class="entry-slider owl-carousel owl-theme owl-theme-light">
        <img src="{{ asset($thumb) }}" alt="">
    </div><!-- End .entry-slider -->
</div><!-- End .entry-media -->