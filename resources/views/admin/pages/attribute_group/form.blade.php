@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr    = config('zvn.template.form_input');
    $formLabelAttr    = config('zvn.template.form_label');

    $inputHiddenID    = isset($inputHiddenID)    ? $inputHiddenID : '' ;
    $inputHiddenThumb = isset($inputHiddenThumb) ? $inputHiddenThumb : '' ;

    $statusValue      = ['default' => 'Chọn trạng thái', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $valueID             = isset($item['id'])           ? $item['id'] : '' ;
    $valueName           = isset($item['name'])         ? $item['name'] : '' ;
    $valueStatus         = isset($item['status'])       ? $item['status'] : '' ;
    $inputHiddenID       = Form::hidden('id',$valueID);
    $checked             = ($item['change_price'] == 'yes') ? true : false;
    $elements = [
        [
            'label'   => Form::label('name', 'Tên nhóm thuộc tính', $formLabelAttr),
            'element' => Form::text('name', $valueName, $formInputAttr )
        ],
        [
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $valueStatus, $formInputAttr)
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
