@extends('admin.index')
@section('title','SẢN PHẨM | SỬA')
@section('main')

<h1 class="text-center text-black-50">
    <i class="fa-regular fa-rectangle-list"></i>
    Sửa sản phẩm
    <i class="fa-regular fa-rectangle-list"></i>
</h1>

<a class="btn btn-outline-dark" href="{{route('product.index')}}"><i class="fa-solid fa-arrow-left"></i> Trở về</a>

<div class="container p-3">
    <form action="{{route('product.update',$product)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        {{--  --}}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="text-black-50">Tên sản phẩm</label>
                    <input type="text" name="name" id="productName" value="{{old('name') ? old('name') : $product->name}}" onkeyup="ChangeToSlug()" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="text-black-50">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{old('slug') ? old('slug') : $product->slug}}" class="form-control @error('slug') is-invalid @enderror w-75">
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="row">   
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="text-black-50">Giá</label>
                    <input type="number" name="price" id="" value="{{old('price') ? old('price') : $product->price}}" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="text-black-50">Giá khuyến mãi</label>
                    <input type="number" name="sale_price" id="" value="{{old('sale_price') ? old('sale_price') : $product->sale_price}}" class="form-control @error('sale_price') is-invalid @enderror w-75">
                    @error('sale_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="text-black-50">Danh mục</label>    
                    <select name="category_id" id="" class="form-control w-75">
                        {{categoryParent($cate,$product->category_id)}}
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="text-black-50">Trạng thái</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label p-1">
                            <input class="form-check-input" type="radio" name="statusPro" id="" value="1" {{$product->statusPro ? 'checked' : ''}} >Còn hàng
                        </label>
                        <label class="form-check-label p-1">
                            <input class="form-check-input" type="radio" name="statusPro" id="" value="0" {{!$product->statusPro ? 'checked' : ''}} >Hết hàng
                        </label>
                    </div>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="form-group">
            <label for="" class="text-black-50">Hình Ảnh</label>
            <input type="file" name="photo" id="" class="form-control @error('photo') is-invalid @enderror w-50" onchange="showImg(this,'img')">
            @error('photo')
                <div class="alert alert-danger w-50">{{ $message }}</div>
            @enderror
            <div>
                <img id="img" src="{{asset('storage')}}/images/{{$product->image}}" alt="" width="200px">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="text-black-50">Ảnh mô tả</label>
            <input type="file" name="photos[]" id="input" class="form-control @error('name') is-invalid @enderror w-75" onchange="preview(this)" multiple>
            <div class="row" id="imgs"></div>
            @error('photos')
                <div class="alert alert-danger w-75">{{ $message }}</div>
            @enderror
        </div>
        {{--  --}}
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="" class="text-black-50">Ảnh nổi bật</label>
                    <input type="checkbox" name="stock" id="" multiple>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="">Mô tả chi tiết sản phẩm</label>
                    <br>
                    <textarea name="description"  id="editor1" cols="80" rows="5">{{$product->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger w-25">{{ $message }}</div>
                    @enderror
                </div>
                
            </div>
        </div>
        {{--  --}}
        <button type="submit" class="btn btn-outline-success">Lưu</button>
        <a class="btn btn-outline-dark" href="{{ route('product.index') }}" class="btn btn-light"> Trở về</a>
    </form>
</div>
@endsection
@section('script')

<script src="{{asset('assets\ckeditor\ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor1');
</script>
<script language="javascript">
    function ChangeToSlug()
    {
        var productName , slug;
  
        //Lấy text từ thẻ input title 
        productName = document.getElementById("productName").value;
  
        //Đổi chữ hoa thành chữ thường
        slug = productName.toLowerCase();
  
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>
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
    function preview(elem, output = '') {
        const i = 0;
        Array.from(elem.files).map((file) => {
            const blobUrl = window.URL.createObjectURL(file)
            output +=
                `<div class="col-md-3" id="img-add">
                    
                    <div class="card "> 
                        <img class="card-img-bottom" src=${blobUrl} alt="" width="100%" >
                    </div>
                </div>`
            })
            document.getElementById('imgs').innerHTML += output
        }
</script>
@endsection