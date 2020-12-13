@extends('admin.main')
@php
    use App\Helpers\Template as Template;
    use App\Helpers\SelectBox as SelectBox;
    use App\Models\CategoryArticleModel  ;

    $categoryModel = new CategoryArticleModel();
    $xhtmlButtonFilter = Template::showButtonFilter($controllerName, $itemsStatusCount, $params['filter']['status'], $params['search'] ,$params['filter']['category']);
    $xhtmlAreaSeach    = Template::showAreaSearch($controllerName, $params['search']);
 
    $itemSelectBox      = $categoryModel->listItems(null,['task' => 'admin-list-nested']);

    $xhtmlSelectBox  = Template::showSelectBoxProductNested($items,$itemSelectBox,'cat_filter',$params['filter']['category']);

@endphp
@section('content')
    
@include ('admin.templates.page_header', ['pageIndex' => true,'hidden' => false])
@include ('admin.templates.zvn_notify')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.templates.x_title', ['title' => 'Bộ lọc'])
            <div class="x_content">
                <div class="row">
                    <div class="col-md-6">{!! $xhtmlButtonFilter !!}</div>
                    {{-- <div class="col-md-3">{!! $xhtmlSelectBox !!}</div> --}}
                    <div style="display:flex; class="col-md-6">{!! $xhtmlAreaSeach !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">{!! $xhtmlSelectBox !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.templates.x_title', ['title' => 'Danh sách'])
            @include('admin.pages.article.list')
        </div>
    </div>
</div>
    
@if (count($items) > 0)
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Phân trang'])
                @include('admin.templates.pagination')
            </div>
        </div>
    </div>
@endif
@endsection
