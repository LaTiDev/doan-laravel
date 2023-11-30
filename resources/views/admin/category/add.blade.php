@extends('admin.index')
@section('title','DANH MỤC | THÊM')
@section('main')

<h1 class="text-center text-black-50">
    <i class="fa-regular fa-rectangle-list"></i>
    Thêm mới danh mục
    <i class="fa-regular fa-rectangle-list"></i>
</h1>

<a class="btn btn-outline-dark" href="{{route('category.index')}}"><i class="fa-solid fa-arrow-left"></i> Trở về</a>

<div class="container p-3">
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{--  --}}
        <div class="form-group">
            <label for="" class="text-black-50">Tên danh mục</label>
            <input type="text" name="name" id="" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror w-50">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{--  --}}
        <div class="form-group">
            <label for="" class="text-black-50">Danh mục cha</label>    
            <select name="parent_id" id="" class="form-control w-25">
                <option value="0">Chọn</option>
                {{categoryParent($categories)}}
            </select>
        </div>
        {{--  --}}
        <div class="form-group">
            <label for="" class="text-black-50">Trạng thái </label>
            <div class="form-check form-check-inline">
                <label class="form-check-label p-1">
                    <input class="form-check-input" type="radio" name="status" id="" value="1" checked>Còn hàng
                </label>
                <label class="form-check-label p-1">
                    <input class="form-check-input" type="radio" name="status" id="" value="0">Hết hàng
                </label>
            </div>
        </div>
        {{--  --}}
        <div class="form-group">
            <label for="" class="text-black-50">Hình Ảnh</label>
            <input type="file" name="photo" id="" class="form-control @error('name') is-invalid @enderror w-50" onchange="showImg(this,'img')">
            @error('photo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div>
                <img id="img" src="" alt="" width="200px">
            </div>
        </div>
        {{--  --}}
        <button type="submit" class="btn btn-outline-success">Thêm mới</button>
        <a class="btn btn-outline-dark" href="{{ route('category.index') }}" class="btn btn-light"> Trở về</a>
    </form>
</div>



@endsection

@section('script')
<script>
    function showImg(input,target){
    let file = input.files[0];
    let reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = function(){
        let img = document.getElementById(target);
        img.src = reader.result;
    }
}

</script>
@endsection