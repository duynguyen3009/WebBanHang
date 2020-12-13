@php   
    // $controllerName = !empty($controllerName) ? $controllerName  : null ;
    use App\Helpers\Template as Template ;
    use App\Helpers\URL;
    $arrThumb = json_decode($value["thumb"]) ;
    $thumb  = Template::showProductThumb($arrThumb[0] , 'uploads')  ;
    if($pageIndex == 'artilce-lastest'){
        $thumb  = Template::showItemThumb($controllerName,$value['thumb'], null)  ;
    }
    $titleImage = null ;
    $title      = null;
    if($typeProduct == 'sale' && $value['promotion'] != null){
        $titleImage = "Khuyến mãi" ;
        $title = '<span class="product-label label-hot">'.$titleImage.'</span>';
    }elseif($typeProduct == 'featured'){
        $titleImage = "Nổi bật" ;
        $title = '<span class="product-label label-hot">'.$titleImage.'</span>';
    }
    $link = URL::linkProduct($value['id'], $value['name']);
@endphp
<figure class="product-image-container">
    <a href="{{ $link }}" class="product-image">
        {!! $thumb !!}
    </a>
    {!! $title  !!}
</figure> 