@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\MenuModel;
    use App\Helpers\URL;
    
    $category      = new MenuModel();
    $itemsCategory = $category->getItem(null, ['task' => 'admin-get-nested']);
    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue      = ['default' => 'Chọn trạng thái', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $typeMenuValue    = ['default' => 'Chọn kiểu Menu', 'normal' => config('zvn.template.type_menu.normal.name'), 'category_article' => config('zvn.template.type_menu.category_article.name'), 'category_product' => config('zvn.template.type_menu.category_product.name')];
    $inputHiddenID    = Form::hidden('id', $item['id']);

    $elements = [
        [
            'label'   => Form::label('name', 'Tên', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr )
        ],[
            'label'   => Form::label('link', 'Đường dẫn', $formLabelAttr),
            'element' => Form::text('link', $item['link'],  $formInputAttr )
        ],
        [
            'label'   => Form::label('parent_id', 'Thư mục cha', $formLabelAttr),
            'element' => Template::showSelectBoxCategoryNested($item, $itemsCategory),
        ],
        [
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'], $formInputAttr)
        ],
        [
            'label'   => Form::label('type_menu', 'Kiểu danh mục', $formLabelAttr),
            'element' => Form::select('type_menu', $typeMenuValue, $item['type_menu'], $formInputAttr)
        ],
        [
            'element' => $inputHiddenID . Form::submit('Lưu', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
                <div class="x_content">
                    {{ Form::open([
                        'method'         => 'POST', 
                        'url'            => route("$controllerName/save"),
                        'accept-charset' => 'UTF-8',
                        'enctype'        => 'multipart/form-data',
                        'class'          => 'form-horizontal form-label-left',
                        'id'             => 'main-form' ])  }}
                        {!! FormTemplate::show($elements)  !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
