@extends('fe.home')
@section('title','LaTi | HOME')
@section('main')

{{-- banner --}}
<div class="banner">
    <nav>
        <div class="menu-banner">
            <ul>

                <li class="active"><a href="{{route('index')}}">Trang chủ</a></li>
                @foreach ($categories as $item)
                    <li><a href="{{route('listPN.index',$item->id)}}">{{$item->name}}</a></li>
                @endforeach
                
                
            </ul>
            <div class="logo">
                <a href="">
                    <i class="fa-regular fa-heart">
                        <span class="shopping">{{$cart->getTotalQuantity()}}</span>
                    </i>
                </a>
                <span class="text-light m-3">|</span>
                <a href="{{route('cart.index')}}">
                    <i class="fa-solid fa-cart-shopping">
                        <span class="shopping">{{$cart->getTotalQuantity()}}</span>
                    </i>
                </a>
            </div>
        </div>
    </nav>
    <div class="center">
        <div class="title">Đồ gỗ VIP</div>
        <button>
            <div class="btn">Xem video</div>
            <div class="btn">Tìm hiểu thêm</div>
        </button>
    </div>
</div>
{{-- banner end --}}

<main>
    <div class="container p-2">
        <div class="row">
            <!-- category -->
            <div class="col-lg-3">
                <h3 class="h2 text-center"> <i class="fa-solid fa-hand-holding-heart"></i> </h3>
                <ul class="list-group text-center sidebar">
                    <li class="list-group-item"><a href="#">Phòng khách <i class="fa-solid fa-hand"></i></a></li>
                    <li class="list-group-item"><a href="#">Phòng ngủ <i class="fa-solid fa-hand"></i></a></li>
                    <li class="list-group-item"><a href="#">Phòng bếp <i class="fa-solid fa-hand"></i></a>
                    </li>
                    <li class="list-group-item"><a href="#">Phòng thờ <i class="fa-solid fa-hand"></i></a></li>
                    <li class="list-group-item"><a href="#">Văn phòng <i class="fa-solid fa-hand"></i></a></li>
                    <li class="list-group-item"><a href="#">Combo VIP <i class="fa-solid fa-hand"></i></a></li>
                </ul>
            </div>
            <!-- category end-->
            <!-- product -->
            <div class="col-lg-9 products">

                <!-- peth1 la gi -->
                @include('fe.products.hot')
                <!-- owl-carousel end -->

            </div>
            <!-- product end-->
        </div>
    </div>

    <!-- show food products -->

    @include('fe.products.vip')

    <!-- show food products end-->

    <div class="admin">
        <a target="_blank" class="btn btn-outline-danger" href="{{route('admin.index')}}">Bạn muốn trở thành người bán hàng ? <i class="fa-solid fa-people-roof"></i></a>
    </div>
</main>

@endsection