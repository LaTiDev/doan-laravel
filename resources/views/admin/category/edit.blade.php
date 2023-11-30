@extends('admin.index')
@section('title','DANH MỤC | SỬA')
@section('main')

<h1 class="text-center text-black-50">
    <i class="fa-regular fa-rectangle-list"></i>
    Sửa danh mục
    <i class="fa-regular fa-rectangle-list"></i>
</h1>

<a class="btn btn-outline-dark" href="{{route('category.index')}}"><i class="fa-solid fa-arrow-left"></i> Trở về</a>

<div class="container p-3">
    <form action="{{route('category.update',$category)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        {{--  --}}
        <div class="form-group">
        <label for="" class="text-black-50">Tên danh mục</label>
        <input type="text" name="name" id="" value="{{old('name') ? old('name') : $category->name}}" class="form-control @error('name') is-invalid @enderror w-50">
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        {{--  --}}
        <div class="form-group">
        <label for="" class="text-black-50">Danh mục cha</label>    
        <select name="parent_id" id="" class="form-control w-25">
            <option value="">Chọn</option>
            {{categoryParent($categories,$category->parent_id)}}
        </select>
        </div>
        {{--  --}}
        <div class="form-group">
        <label for="" class="text-black-50">Trạng thái </label>
            <div class="form-check form-check-inline">
                <label class="form-check-label p-1">
                    <input class="form-check-input" type="radio" name="status" id="" value="1" {{$category->status ? 'checked' : ''}} >Còn hàng
                </label>
                <label class="form-check-label p-1">
                    <input class="form-check-input" type="radio" name="status" id="" value="0" {{!$category->status ? 'checked' : ''}} >Hết hàng
                </label>
            </div>
        </div>
        {{--  --}}
        <div class="form-group">
        <label for="" class="text-black-50">Hình Ảnh</label>
        <input type="file" name="photo" id=""  class="form-control @error('photo') is-invalid @enderror w-50" onchange="showImg(this,'img')">
        @error('photo')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <div>
            <img id="img" src="{{asset('storage')}}/images/{{$category->image}}" alt="" width="200px">
        </div>
        {{--  --}}
        <button type="submit" class="btn btn-outline-success"> Lưu</button>
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