@php
    //  session()->forget('cart'); 
@endphp
@section('title', 'Trang chủ')
@extends('news.main')
@section('content')
    
<main class="main">
    @include('news.block.slider')       
    @include('news.block.service')       
    @include('news.block.gallery')
    @include('news.block.productSale')
    @include('news.block.productFeatured')
    @include('news.block.productAcquatic')
    @include('news.block.feedback')       
    @include('news.block.blog')       
    {{-- @include('news.block.partner')        --}}
    @include('news.block.video')       
</main> 
@endsection