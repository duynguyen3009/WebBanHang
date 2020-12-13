@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Helpers\SelectBox;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    $statusValue      = ['default' => 'Chọn trạng thái' , 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $evaluateValue    = ['1' => 1 , '2' => 2 , '3' => 3 , '4' => 4 , '5' => 5];
    //  $evaluateValue    = SelectBox::showItemStar();

    $inputHiddenID    = Form::hidden('id', $item['id']);
    $inputHiddenThumb = Form::hidden('thumb_current', $item['thumb']);
                    

    $elements = [
        [
            'label'   => Form::label('name', 'Tên', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr )
        ],[
            'label'   => Form::label('description', 'Mô tả', $formLabelAttr),
            'element' => Form::textArea('description', $item['description'],  $formCkeditor )
        ],[
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'], $formInputAttr)
        ],[
            'label'   => Form::label('thumb', 'Hình ảnh', $formLabelAttr),
            'element' => Form::file('thumb', $formInputAttr ),
            'thumb'   => (!empty($item['id'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']) : null ,
            'type'    => "thumb"
        ],[
            'label'   => Form::label('combostar', 'Đánh giá', $formLabelAttr),
            'element' => Form::select('combostar', $evaluateValue, $item['combostar'], $formInputAttr),
            // 'element' => $evaluateValue ,
            'type'    => "selectbox"
        ],[
            'element' =>  $inputHiddenID . $inputHiddenThumb . Form::submit('Save', ['class'=>'btn btn-success']),
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
