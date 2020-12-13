@extends('admin.main')
@php
    use App\Helpers\Template as Template;
    use App\Helpers\SelectBox as SelectBox;
    $xhtmlButtonFilter = Template::showButtonFilter($controllerName, $itemsStatusCount, $params['filter']['status'], $params['search'] , $params['filter']['ishome']  );
    $xhtmlAreaSeach    = Template::showAreaSearch($controllerName, $params['search']);
    $isHome = ['no'=> config('zvn.template.is_home.no.name'), 'yes' => config('zvn.template.is_home.yes.name')];
    $selectBoxIsHome = SelectBox::showItemSelectIsHome($isHome, $params['filter']['ishome']);
@endphp

@section('content')
    
    @include ('admin.templates.page_header', ['pageIndex' => true])
    @include ('admin.templates.zvn_notify')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Bộ lọc'])
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-7">{!! $xhtmlButtonFilter !!}</div>
                        <div class="col-md-5">{!! $xhtmlAreaSeach !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">{!! $selectBoxIsHome !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Danh sách'])
                @include('admin.pages.category_question.list')
            </div>
        </div>
    </div>
    
    @if (count($items) > 0)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title', ['title' => 'Phân trang'])
                    {{-- @include('admin.templates.pagination') --}}
                </div>
            </div>
        </div>
    @endif
@endsection
