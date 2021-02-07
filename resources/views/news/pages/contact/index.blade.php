@section('title', 'Liên hệ')
@extends('news.main')
@section('content')
    
<main class="main" style="background-color: white">
    {{-- @include('news.elements.breadcrumb') --}}
    <div class="container">
        @include('news.pages.contact.childs.map')
        <div class="row">
            @include('news.pages.contact.childs.form')
            @include('news.pages.contact.childs.info')
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-8"></div><!-- margin -->
</main><!-- End .main -->
@endsection