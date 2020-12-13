@php
    use App\Helpers\MenuNested ;
    use App\Models\MenuModel ;
    use App\Models\CategoryArticleModel;
    use App\Models\CategoryProductModel;
    
    $menuModelNested            = new MenuModel();
    $articlCategoryeModel       = new CategoryArticleModel();
    $productCategoryeModel      = new CategoryProductModel();
    $menuNested         = $menuModelNested->listItems(null,['task' => 'list-item-menu']);
    $articleMenu        = $articlCategoryeModel ->listItems(null, ['task'  => 'news-list-nested']);
    $productMenu        = $productCategoryeModel->listItems(null, ['task'  => 'news-list-nested']);
    $xhtmlMenu          =  '<nav class="main-nav"> <ul class="menu sf-arrows"> ' ;
    foreach ($menuNested as $key => $value) {
        $classActive = request()->routeIs($value['link']) ? 'active' : '' ;
        $link        = route($value['link']) ;
        if($value['type_menu'] == 'normal'){
            $xhtmlMenu .= '<li class="'.$classActive .'"><a href="'.$link.'">'.$value['name'].'</a></li>';
        }
        if($value['type_menu'] == 'category_article'){
            $classActive =  (request()->routeIs('article/index') || request()->routeIs('category/index') )  ? 'active' : '' ;
            $childArticle = MenuNested::recursiveMenuArticle($articleMenu) ;
            $xhtmlMenu   .= '<li class="'.$classActive .'"><a href="#" class="sf-with-ul">'.$value['name'].'</a>'.$childArticle.'</li>';  
        }
        if($value['type_menu'] == 'category_product'){
            $classActive =  (request()->routeIs('catProduct/index')  )  ? 'active' : '' ;    
            $childProduct = MenuNested::recursiveMenuProduct($productMenu) ;
            $xhtmlMenu   .= '<li class="'.$classActive .'"><a href="'.$link.'" class="sf-with-ul">'.$value['name'].'</a>'.$childProduct.'</li>';  
        }
    }    
    $xhtmlMenu .= '<ul><nav>' ; 
@endphp
<div class="header-bottom sticky-header" style="background-color: #ececec;">
    <div class="container">
        {!! $xhtmlMenu !!}
    </div>
</div>

