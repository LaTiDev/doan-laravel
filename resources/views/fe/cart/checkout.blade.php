@extends('fe.home')
@section('title','LaTi | CART')
@section('main')

<!-- add to card  -->
<div class="bodyCard p-3">
    <div class="container card-container">
        <h1 class="h1-card text-center text-uppercase">
            <i class="fa-regular fa-credit-card"></i>
        </h1>
    </div>
</div>
{{--  --}}
<section>
    <div class="container">
    
    <form action="{{route('carts.addDb')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (Auth::user())
            <input type="text" hidden value="{{$user->id}}" name="user_id">
        @endif
        <input type="text" hidden value="0" name="Status">
        {{-- <input type="text" hidden value="{{}}" name="productId"> --}}

        <div class="row justify-content-lg-center justify-content-md-center">
    
            <div class="col-lg-8 carts-bg-1">
                {{--  --}}
                <div class="row mb-3 p-2 border-bottom">
                    <div class="col-lg-6">
                        <h4>Thông tin đơn hàng</h4>
                    </div>
                    <div class="col-lg-6">
                        <h4>Vận chuyển</h4>
                    </div>
                </div>
                <div class="row mb-3 p-2 border-bottom">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text"
                            class="form-control p-2" value="{{$user->name ?? ''}}" name="">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text"
                            class="form-control p-2" value="{{$user->phone ?? ''}}" name="">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text"
                            class="form-control p-2" value="{{$user->address ?? ''}}" name="">
                        </div>
                        <div class="form-group">
                            <label for="">Ý kiến khách hàng (có thể trống)</label>
                            <textarea style="border:gray" id="" cols="37" name="order_note"></textarea>
                        </div>

                        
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <h4>Thanh toán</h4>
                            <tr>
                                <th>
                                    <div class="form-check p-2">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" 
                                        name="methodPayment" id="" value="3" checked>
                                        Thanh toán qua thẻ thanh toán, ứng dụng ngân hàng VN PAY
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check p-2">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="methodPayment" id="" value="2" >
                                        Thanh toán VN PAY-QR
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check p-2">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="methodPayment" id="" value="1" >
                                        Thanh toán qua Ví MoMo
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="p-2">
                                        <input type="radio" class="form-check-input" name="methodPayment" id="" value="0" checked>
                                        Thanh toán khi nhận hàng (COD)
                                    </div>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                
                {{--  --}}
                <a class="btn btn-outline-dark p-2" href="{{route('index')}}">
                    <i class="fa-solid fa-left-long"></i> Trở về trang chủ
                </a>
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
                    <table class="table">
                        <tbody>
                            @foreach ($cart->list() as $item)
                                <tr>
                                    <td scope="row">
                                        <img src="{{asset('storage/images')}}/{{$item['image']}}" alt="" width="50px">
                                    </td>
                                    <td>
                                        {{$item['name']}}
                                    </td>
                                    <td>
                                        {{number_format($item['quantity'])}}
                                    </td>
                                    <td>
                                        {{number_format($item['price'] * $item['quantity'])}}đ
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{--  --}}
                <hr class="my-4">
                {{--  --}}
                <div class="d-flex justify-content-between mb-4 p-2">
                    <h5 class="text-uppercase">Tạm tính: </h5>
                    <h5 id="total_price">{{number_format($cart->getTotalPrice())}} VND</h5>
                    <input type="text" name="total_price" value="{{ $cart->getTotalPrice() }}" hidden>
                </div>
                {{--  --}}
        
                <button class="btn btn-block btn-success" type="submit"><i class="fa-solid fa-shield-heart"></i> 
                    Đặt hàng <i class="fa-solid fa-shield-heart"></i>
                </button>
                {{--  --}}
            </div>
            
        </div>
    </form>

    </div>
</section>

@endsection