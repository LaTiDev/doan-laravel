@extends('admin.index')
@section('title','ĐẶT HÀNG')
@section('main')

<h1 class="text-center text-black-50">
    <i class="fa-regular fa-rectangle-list"></i>
    Danh sách đơn đặt hàng
    <i class="fa-regular fa-rectangle-list"></i>
</h1>

<table class="table text-center table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th>Phương thức thanh toán</th>
            <th>Lưu ý đặt hàng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order as $item)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
                <td>
                    @if ($item->Status==0)
                        <label class="badge">Chờ xác nhận</label>
                    @elseif($item->Status==1)
                        <label class="badge">Đang chuẩn bị hàng</label>
                    @elseif($item->Status==2)
                        <label class="badge">Đang giao hàng</label>
                    @elseif($item->Status==3)
                        <label class="badge">Giao hàng thành công</label>
                    @endif
                </td>
                <td>
                    <label class="badge badge-success">{{($item->methodPayment==1)?
                    "Thẻ tín dụng":"Thanh toán khi nhận hàng"}}</label>
                </td> 
                <td>
                    <label class="badge">{{$item->order_note}}</label>
                </td>
                <td >
                    <a href="" class="btn btn-outline-warning">
                        <i class="fa-solid fa-wrench text-warning"></i>
                    </a>
                    <a href="{{route('order.show',$item->id)}}" class="btn btn-outline-primary">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </a>
                </td>
            </tr>
            
        @endforeach
    </tbody>
</table>

{{ $order->links() }}

@endsection