@extends('admin.index')
@section('title','THÙNG RÁC')
@section('main')
<h1 class="text-center text-black-50">
    <i class="fa-regular fa-rectangle-list"></i>
    Danh sách danh mục đã xóa
    <i class="fa-regular fa-rectangle-list"></i>
</h1>

    <a class="btn btn-outline-dark" href="{{route('category.index')}}"><i class="fa-solid fa-arrow-left"></i> Trở về</a>

@include('sweetalert::alert')

<table class="table text-center">
    <thead>
        <tr>
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
        @foreach ($trashCate as $item)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->parent->name ?? ''}}</td>
                <td>{!!$item->status ? '<span class="btn btn-success">Còn hàng</span>' : '<span class="btn btn-danger">Hết hàng</span>' !!}</td>
                <td><img src="{{asset('storage/images')}}/{{$item->image}}" width="100px" alt=""></td>
                <td>
                    <a href="{{route('category.restore',$item->id)}}" onclick="alert()->success('success', 'Khôi phục sản phẩm thành công')" class="btn btn-primary">
                        <i class="fa-solid fa-rotate-left"></i> Khôi phục
                    </a>
                    <a href="{{route('category.forceDelete',$item->id)}}" 
                        onclick="return confirm('Bạn có muốn xóa vĩnh viễn ?')" 
                        class="btn btn-danger"> Xóa vĩnh viễn
                    </a>
                </td>
            </tr>
            
        @endforeach
    </tbody>
</table>

@endsection