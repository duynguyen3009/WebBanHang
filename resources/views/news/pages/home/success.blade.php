@extends('news.main')
@section('content')
    <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
      <i class="checkmark">✓</i>
    </div>
      <h1>Thành công</h1> 
      <p>Bạn đã gửi thành công phản hồi<br/> Chúng tôi đã tiếp nhận và xử lý thông tin của bạn trong vòng 24H</p>
    <p>Bấm vào <strong><a href="{{ route('home')}}">đây</a></strong> để về trang chủ</p>
    </div>
    
@endsection