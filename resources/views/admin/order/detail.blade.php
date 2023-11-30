@extends('admin.index')
@section('title','KHÁCH HÀNG')
@section('main')

<h1 class="text-center text-black-50">
    <i class="fa-solid fa-person-shelter"></i>
    Danh sách khách hàng
    <i class="fa-solid fa-person-shelter"></i>
</h1>

<table class="table text-center table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Mã Đơn Hàng</th>
            <th>Ảnh sản phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Thành tiền</th>
            <th>Ngày tạo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detail as $item)
            <tr>
                <td>{{$item->product->id}}</td>
                <td>{{$item->order_id}}</td>
                <td><img src="{{asset('storage/images')}}/{{$item->product->image}}" alt="" width="150px"></td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{number_format($item->order_detail_price * $item->quantity)}}</td>
                <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
            </tr>
            
        @endforeach
    </tbody>
</table>

@endsection