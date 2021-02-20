
<style>
    .main{
        background-color: white;
        height: 80vh;
        }

    .cl-white{
        color: white;
    }
    .introduce-container{
        max-width: 1200px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin:0px auto;
        font-family: 'Dancing Script', cursive;
    }

    .introduce-item{
        width: 30%;
        border: 1px solid rgb(238, 227, 227);
        padding: 1rem;
        box-shadow: 0 4px 2px -2px gray;
        background: linear-gradient(#7f92e9, #89daee);
    }

    .title{
        font-weight: 700;
    }
    .title::after{
        content: '';
        width: 100%;
        height: 2px;
        display: block;
        background-color: rgb(158, 154, 154);
    }

    .person{
        flex-grow: 3;
        display: flex;
        margin-top: 4rem;
        border: 1px solid rgb(238, 227, 227);
        padding: 1rem;
        box-shadow: 0 4px 2px -2px gray;
        background: linear-gradient(#dda584, #ece09d);
        border-radius: 10px;
    }

    .person .image img{
        width: 15rem;
        height: 15rem;
        border-radius: 50%;
    }
    .person .info {
        margin-left: 2rem;
    }
    .person .info .name{
        font-weight: 700;
        font-size: 4rem;
    }
    .person .info .description{
        font-style: italic;
        opacity: 0.7;
        margin-bottom: 1rem;
        font-size: 2rem;
    }
    .person .info i{
        color: #9f9fe4;
        font-size: 3rem;
    }

</style>
@section('title', 'Giới thiệu')
@extends('news.main')
@section('content')
@php
    $mission        = config('zvn-intro.mission');
    $history        = config('zvn-intro.history');
    $opinion        = config('zvn-intro.opinion');
    $owner          = config('zvn-intro.owner');
    $description    = config('zvn-intro.description');
    $avartar        = config('zvn-intro.avartar');
@endphp
<main class="main">
    <div class="introduce-container" >
        <div class="introduce-item" >
            <p class="title" >Sứ mệnh của chúng tôi</p>
            <p class="description"> {{$mission}}</p>
        </div>
        <div class="introduce-item">
            <p class="title">Lịch sử hình thành</p>
            <p class="description"> {{$history}}</p>
        </div>
        <div class="introduce-item">
            <p class="title">Quan điểm làm việc</p>
            <p class="description"> {{$opinion}}</p>
        </div>
        <div class="introduce-item person">
            {{-- <p class="title">Đội ngũ nhân sự</p> --}}
            <div class="image">
                <img src="{{ asset($avartar) }}" alt="">
            </div>
            <div class="info">
                <p class="name">{{$owner}}</p>
                <p class="description">{{$description}}</p>
                <a href="#"><i class="fab fa-facebook    "></i></a>
            </div>
        </div>
    </div>
</main>
@endsection