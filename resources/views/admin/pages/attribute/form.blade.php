@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\AttributeGroupModel; 
    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue            = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $attributeGroup         = new AttributeGroupModel();
    $itemsAttributeGroup    = $attributeGroup->listItems(null, ['task' => 'admin-list-items-in-selectbox']);
    $inputHiddenID          = Form::hidden('id', $item['id']);
  
    if (!isset($item['change_price'])) {
        $checked = null;
    }elseif ($item['change_price'] == 'no') {
        $checked = false;
    }elseif ($item['change_price'] == 'yes') {
        $checked = true;
    }
  
    $elements = [
        [
            'label'   => Form::label('name', 'Tên thuộc tính', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr )
        ],
        [
            'label'   => Form::label('attribute_group', 'Nhóm thuộc tính', $formLabelAttr),
            'element' => Form::select('attribute_group_id', $itemsAttributeGroup, $item['attribute_group_id'], $formInputAttr)
        ],
        [
            'label'   => Form::label('change_price', 'Thay đổi giá', $formLabelAttr),
            'element' => Form::checkbox('change_price', 'no', $checked)
        ],
        [
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'], $formInputAttr)
        ],
        [
            'element' => $inputHiddenID . Form::submit('Save', ['class'=>'btn btn-success']),
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
