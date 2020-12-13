@section('title', 'Giới thiệu')
@extends('news.main')
@section('content')
    
<main class="main">
    <div class="about-section">
        <div class="container">
            {!! $itemsIntro['content'] !!}
        </div>
    </div>

</main>
@endsection