@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $inputHiddenID    = Form::hidden('id', $item['id']);
    $inputHiddenThumb = Form::hidden('thumb_current', $item['thumb']);

@endphp

@section('content')
    @include ('admin.templates.error')
    
            {{ Form::open([
                'method'         => 'POST', 
                'url'            => route("$controllerName/save"),
                'accept-charset' => 'UTF-8',
                'enctype'        => 'multipart/form-data',
                'class'          => 'form-horizontal form-label-left',
                'id'             => 'main-form' ])  }}
                 @include ('admin.templates.page_header', ['pageIndex' => false , 'hidden' => true])
    
                <div class="row">
                    @include('admin.pages.article.article')
                    @include('admin.pages.article.seo')
                </div>
           
                {!! $inputHiddenID . $inputHiddenThumb  !!}

            {{ Form::close() }}
    
        
@endsection
