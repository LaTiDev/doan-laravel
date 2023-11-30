@extends('admin.index')
@section('title','DANH MỤC')
@section('main')
<h1 class="text-center text-black-50">
    <i class="fa-regular fa-rectangle-list"></i>
    Danh sách danh mục
    <i class="fa-regular fa-rectangle-list"></i>
</h1>

<div class="row">
    <div class="col-lg-10">
        <a class="btn btn-outline-success" href="{{route('category.create')}}"><i class="fa-solid fa-plus"></i> Thêm mới danh mục</a>
    </div>
    <div class="col-lg-2">
        <a class="btn btn-outline-danger" href="{{route('category.trash')}}"><i class="fa-solid fa-trash-can"></i> Thùng rác</a>
    </div>
</div>

@include('sweetalert::alert')

<table class="table text-center table-bordered">
    <thead>
        <tr>
            <th><input id="master-checkbox" onclick="checkbox()" type="checkbox"></th>
            <th>STT</th>
            <th>TÊN</th>
            <th>TRẠNG THÁI</th>
            <th>HÌNH ẢNH</th>
            <th>DANH MỤC CHA</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $item)
            <tr>
                <td><input id="{{$item->id}}" class="de" name="sub" type="checkbox"></td>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{!!$item->status ? '<span class="btn btn-success">Còn hàng</span>' : '<span class="btn btn-danger">Hết hàng</span>' !!}</td>
                <td><img src="{{asset('storage/images')}}/{{$item->image}}" width="100px" alt=""></td>
                <td>{{$item->parent->name ?? ''}}</td>
                <td>
                    <a class="btn btn-outline-warning" title="Sửa" href="{{route('category.edit',$item)}}">
                        <i class="fa-solid fa-wrench p-2 text-warning"></i>
                    </a>
                </td>
                <td>
                    <form action="{{route('category.destroy',$item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $category->links() }}

@endsection
