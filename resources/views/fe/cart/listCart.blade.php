@extends('fe.home')
@section('title','LaTi | CART')
@section('main')

<!-- add to card  -->
<div class="bodyCard p-3">
    <div class="container card-container">
        <h1 class="h1-card text-center text-uppercase">
            Giỏ hàng
            <i class="fa-solid fa-cart-shopping icon-card"></i>
            <span class="shopping">{{$cart->getTotalQuantity()}}</span>
        </h1>
    </div>
</div>
{{--  --}}

<section>
<div class="container">

    @include('sweetalert::alert')

    <div class="row justify-content-lg-center justify-content-md-center">

        <div class="col-lg-8 carts-bg-1">
            {{--  --}}
            <div class="row mb-3 p-2 d-flex align-items-center border-bottom">
                <div class="col-lg-2 text-center menu-carts">Ảnh</div>
                <div class="col-lg-2 text-center menu-carts">Tên</div>
                <div class="col-lg-2 text-center menu-carts">Số lượng</div>
                <div class="col-lg-2 text-center menu-carts">Giá</div>
                <div class="col-lg-2 text-center menu-carts">Tổng phụ</div>
            </div>

            @forelse ($cart->list() as $item)
            <div class="border-bottom" id="parent{{$item['productId']}}">
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-lg-2">
                        <a href="#!">
                            <img src="{{asset('storage/images')}}/{{$item['image']}}" alt="" width="100px">
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <h6 class="detail-cart-name">
                            <a class="text-dark" href="#!">
                                {{$item['name']}}
                            </a>
                        </h6>
                    </div>
                    <div class="col-lg-2 d-flex">
                            <input type="number" value="{{$item['quantity']}}" id="{{$item['productId']}}"
                            size="1" class="w-75 qty text-center form-control">
                    </div> 
                    {{--  --}}
                    <div class="col-lg-2">
                        {{number_format($item['price'])}}
                    </div>
                    <div class="col-lg-3 subtotal-price" id="sb{{$item['productId']}}">
                        {{number_format($item['price'] * $item['quantity'])}} VND
                    </div>
                    <div class="col-lg-1">
                        <a href="" dataId="{{$item['productId']}}" class="btn btn-danger delete-cart">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <h3 class="text-center text-danger border-bottom">Giỏ hàng đang trống</h3>
            @endforelse
            {{--  --}}

            <div class="row justify-content-between d-flex quantity-carts border-bottom">
                <div class="col-lg-9 text-dark">
                    Số lượng trong giỏ: 
                </div>
                <div class="col-lg-3">
                   <span class="shopping">{{$cart->getTotalQuantity()}}</span>  sản phẩm
                </div>
            </div>

            <a class="btn btn-outline-dark p-2" href="{{route('index')}}">
                <i class="fa-solid fa-left-long"></i> Trở về trang chủ
            </a>
            @if (!$cart->list() == [])
                <a class="btn btn-outline-danger p-2 clear-cart" href="{{route('cart.clear')}}"
                onclick="return confirm('a')">
                    <i class="fa-solid fa-trash clear-cart"></i> Xóa tất cả
                </a>
            @endif
        </div>

        <div class="col-lg-4 carts-bg-2">
            <div class="row justify-content-between d-flex quantity-carts">
                <h4 class="menu-tdh">Tổng đơn hàng</h4>
            </div>
            <hr class="my-4">
            {{--  --}}
            <div class="d-flex justify-content-between mb-4 p-2">
                <h5 class="text-quantity">
                    <span class="text-uppercase">Số lượng sản phẩm:</span>
                    <span class="shopping">({{$cart->getTotalQuantity()}})</span> 
                    <span class="text-dark">sản phẩm</span>
                </h5>
            </div>
            {{--  --}}
            <div class="d-flex justify-content-between mb-4 p-2">
                <h5>
                    <span class="text-quantity">
                        <i class="fa-regular fa-clock"></i> Giao hàng trong: 
                    </span>Nhanh 5-7 ngày
                </h5>
            </div>
            <div class="d-flex justify-content-between mb-4 p-2">
                <h5>
                    <span class="text-quantity">
                        <i class="fa-solid fa-truck-fast"></i> Miễn phí vận chuyển: 
                    </span>đơn hàng >100.000.000 VND
                </h5>
            </div>
            <div class="d-flex justify-content-between mb-4 p-2">
                <h5>
                    <span class="text-quantity">
                        <i class="fa-solid fa-right-left"></i> Miễn phí đổi trả: 
                    </span>tại 250+ cửa hàng trong 15 ngày
                </h5>
            </div>
            <div class="d-flex justify-content-between mb-4 p-2">
                <h6>
                    <i class="fa-solid fa-tags"></i> Sử dụng mã giảm giá ở bước thanh toán
                </h6>
            </div>
            {{--  --}}
            <hr class="my-4">
            {{--  --}}
            <div class="d-flex justify-content-between mb-4 p-2">
                <h5 class="text-uppercase">Tạm tính: </h5>
                <h5 id="total_price">{{number_format($cart->getTotalPrice())}} VND</h5>
            </div>
            {{--  --}}
    
            <a href="{{route('checkout')}}" class="btn btn-block btn-warning">
                <i class="fa-solid fa-shield-heart"></i>
                Tiến hành thanh toán
                <i class="fa-solid fa-shield-heart"></i>
            </a>
            {{--  --}}
        </div>
        
    </div>
</div>
</section>

@endsection

@section('ajax-carts')
<script>

    $('.qty').change((event)=>{
        let id = event.target.id;
        let qty = event.target.value;
        let token = '<?php echo csrf_token() ?>';
        let data = {
            'id': id,
            'qty': qty,
            '_token': token
        }
        $.ajax({
            type: 'POST',
            url: '/cart-update',
            data: data,
            success: function (data) {
                console.log(data);
                $('#total_price').html(data.total_price);
                $('#sb' + id).html(data.subtotal);
                $('.shopping').html(data.totalQuantity);
            }
        });
    });

    $('.delete-cart').click(function(){
        let id = $(this).attr("dataId");

        $.ajax({
            type: 'GET',
            url: '/cart-delete/'+id,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#total_price').html(data.total_price);
                $('.shopping').html(data.totalQuantity);
                $('#parent' + id).remove();
            }
        });
    });
    
</script>
@endsection