@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $inputHiddenID    = Form::hidden('id', $item['id']);
    $inputHiddenThumb = Form::hidden('thumb_current', $item['thumb']);
                    

    $elements = [
        [
            'label'   => Form::label('name', 'Tên', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr )
        ],
        [
            'label'   => Form::label('hotline', 'Hotline', $formLabelAttr),
            'element' => Form::text('hotline', $item['hotline'], $formInputAttr )
        ],[
            'label'   => Form::label('address', 'Địa chỉ', $formLabelAttr),
            'element' => Form::text('address', $item['address'], $formInputAttr )
        ],[
            'label'   => Form::label('map', 'Google Map', $formLabelAttr),
            'element' => Form::textarea('map', $item['map'], $formInputAttr )
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'], $formInputAttr)
        ],[
            'label'   => Form::label('description', 'Mô tả', $formLabelAttr),
            'element' => Form::textarea('description', $item['description'],  $formInputAttr )
        ],[
            'label'   => Form::label('ordering', 'Ordering', $formLabelAttr),
            'element' => Form::text('ordering', $item['ordering'],  $formInputAttr )
        ],[
            'label'   => Form::label('thumb', 'Thumb', $formLabelAttr),
            'element' => Form::file('thumb', $formInputAttr ),
            'thumb'   => (!empty($item['id'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']) : null ,
            'type'    => "thumb"
        ],[
            'element' => $inputHiddenID . $inputHiddenThumb . Form::submit('Save', ['class'=>'btn btn-success']),
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
