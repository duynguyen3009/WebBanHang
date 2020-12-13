@section('title', 'Bài viết')
@extends('news.main')
@section('content')
<main class="main" style="background-color: #fff">
    @include('news.pages.category.child-index.breadcrumb')
    @include('news.pages.category.child-index.main')
</main>
@endsection