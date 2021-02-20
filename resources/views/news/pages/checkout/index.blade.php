
@section('title', 'Đặt hàng')
@extends('news.main')
@section('content')
    
<main class="main" style="background-color: white">
    <main class="main">
        @include('news.pages.checkout.child.breadcrumb')

        <div class="container">
            @include('news.pages.checkout.child.steps')

            <div class="row">
               
                @include('news.pages.checkout.child.summary')
                @include('news.pages.checkout.child.info')
               
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
</main><!-- End .main -->
@endsection