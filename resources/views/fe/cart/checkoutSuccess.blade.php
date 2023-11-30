@extends('fe.home')
@section('title','LaTi | CART')
@section('main')

<!-- add to card  -->
<div class="bodyCard p-3">
    <div class="container card-container">
        <h2 class="h1-card text-center">
            <div class="container">
                <h1 class="text-success"><i class="fa-solid fa-circle-check"></i></h1>
            </div>
            <i class="fa-regular fa-face-grin-hearts text-success"></i>
            Cảm ơn bạn đã đặt hàng
            <i class="fa-regular fa-face-grin-hearts text-success"></i>
            <div class="container p-3">
                <a href="{{route('index')}}" class="btn btn-outline-dark p-2">Tiếp tục mua hàng
                    <i class="fa-solid fa-computer-mouse"></i>
                </a>
            </div>
        </h2>
    </div>
</div>
{{--  --}}

@endsection