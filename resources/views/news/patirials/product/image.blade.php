@php   

    use App\Helpers\Template as Template ;
    use App\Helpers\URL;
    $thumb = json_decode($item["thumb"])[0] ;
    $thumb  = 'uploads/' . $thumb  ;
    switch ($type) {
    case "sale":
        $label = 'Khuyễn Mãi';
        break;
    case "featured":
        $label = 'Nổi Bật';
        break;
    default:
        $label = null;
}
@endphp
    <figure class="product-image-container">
        <a href="#" class="product-image">
        <img src="{{asset( $thumb) }}" alt="product" style="width: 400px; height: 200px">
        </a>
        <span class="product-label label-hot">{{ $label }}</span>
    </figure>