@extends('admin.index')
@section('title','THÙNG RÁC')
@section('main')
<h1 class="text-center text-black-50">
    <i class="fa-regular fa-rectangle-list"></i>
    Danh sách sản phẩm đã xóa
    <i class="fa-regular fa-rectangle-list"></i>
</h1>
<div class="row justify-content-between">
    <div class="col-lg-8">
        <a class="btn btn-outline-dark" href="{{route('product.index')}}"><i class="fa-solid fa-arrow-left"></i> Trở về</a>
    </div>
    <div class="col-lg-4">
        <button class="btn btn-outline-primary m-2 " id="retoreAll" type="button"><i class="fa-solid fa-rotate-left"></i> Khôi phục đã chọn</button>
        <a class="btn btn-outline-danger" href="{{route('product.trash')}}"><i class="fa-solid fa-trash-can"></i> Thùng rác</a>
    </div>
</div>

{{-- @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{$message}}</strong>
    </div>
@endif --}}

<table class="table text-center">
    <thead>
        <tr>
            <th><input id="master-checkbox" onclick="checkbox()" type="checkbox"></th>
            <th>STT</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Trạng thái</th>
            <th>Ảnh</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trashPro as $item)
            <tr id="hung">
                <td><input id="{{$item->id}}" class="de" name="sub" type="checkbox"></td>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name }}</td>
                <td>{!!$item->statusPro ? '<span class="btn btn-success">Còn hàng</span>' : '<span class="btn btn-danger">Hết hàng</span>' !!}</td>
                <td><img src="{{asset('storage/images')}}/{{$item->image}}" width="100px" alt=""></td>
                <td>
                    <a href="{{route('product.restore',$item->id)}}" class="btn btn-primary">
                        <i class="fa-solid fa-rotate-left"></i> Khôi phục
                    </a>
                    <a href="{{route('product.forceDelete',$item->id)}}" 
                        onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn ?')" 
                        class="btn btn-danger"> Xóa vĩnh viễn
                    </a>
                </td>
            </tr>
            
        @endforeach
    </tbody>
</table>

@endsection