@php
    use App\Helpers\URL;
    $link = URL::linkCategoryProduct($item['category_product_id'], $item['category_product_name']);
@endphp
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ $link }}">{{ $item['category_product_name'] }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
        </ol>
    </div><!-- End .container -->
</nav>