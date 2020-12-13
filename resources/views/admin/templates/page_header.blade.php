@php
    $buttonSave =  null ;
    $hidden = isset($hidden) ? $hidden : false ;
    $pageTitle = 'Quản lý ' . config('zvn-title.title.'.$controllerName.'') ; 
    $pageButton= sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay về</a>', route($controllerName));
    if($pageIndex == true) {
        $pageButton = sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm mới</a>', route($controllerName . '/form'));
    }
    if($pageIndex == true && $hidden == true ) {
        $pageButton = "";
    }if($pageIndex == false && $hidden == true  ){
        $buttonSave .= '<input class="btn btn-round btn-info"  type="submit" value="Lưu sản phẩm">';
    }
    
@endphp

<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>{{  $pageTitle }}</h3>
    </div>
    <div class="zvn-add-new pull-right">
        {!! $buttonSave . $pageButton !!}
    </div>
</div>