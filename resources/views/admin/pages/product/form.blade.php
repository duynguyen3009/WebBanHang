@extends('admin.main')
@php
     $inputHiddenID      = Form::hidden('id', $item['id']);   
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
                @include('admin.pages.product.form-content')
                @include('admin.pages.product.form-image')
                @include('admin.pages.product.form-attribute')
                @include('admin.pages.product.form-attribute-change-price')
                {!! $inputHiddenID  !!}
            </div>
    {{ Form::close() }}
@endsection
