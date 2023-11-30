@extends('admin.index')
@section('title','SẢN PHẨM')
@section('main')

<h1 class="text-center text-black-50">
    <i class="fa-regular fa-rectangle-list"></i>
    Danh sách sản phẩm
    <i class="fa-regular fa-rectangle-list"></i>
</h1>

<div class="row justify-content-between">
    <div class="col-lg-9">
        <a class="btn btn-outline-success" href="{{route('product.create')}}"><i class="fa-solid fa-plus"></i> Thêm mới sản phẩm</a>
    </div>
    <div class="col-lg-3">
        <button class="btn btn-outline-danger m-2" id="deleteAll" type="button">
            <i class="fa-solid fa-trash-can"></i> Xóa tất cả
        </button>
        <a class="btn btn-outline-danger" href="{{route('product.trash')}}"><i class="fa-solid fa-trash-can"></i> Thùng rác</a>
    </div>
</div>
    
<table class="table text-center table-bordered">
    <thead>
        <tr>
            <th><input id="master-checkbox" onclick="checkbox()" type="checkbox"></th>
            <th>STT</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Trạng thái</th>
            <th>Giá</th>
            <th>Giá sale</th>
            <th>Ảnh</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="hung">
        @foreach ($products as $item)
            <tr>
                <td><input id="{{$item->id}}" class="de" name="sub" type="checkbox"></td>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name }}</td>
                <td>{!!$item->statusPro ? '<span class="btn btn-success">Còn hàng</span>' : '<span class="btn btn-danger">Hết hàng</span>' !!}</td>
                <td>{{number_format($item->price)}}</td>
                <td>{{number_format($item->sale_price)}}</td>
                <td><img src="{{asset('storage/images')}}/{{$item->image}}" width="100px" alt=""></td>
                <td>
                    <a class="btn btn-outline-warning" title="Sửa" href="{{route('product.edit',$item)}}">
                        <i class="fa-solid fa-wrench p-2 text-warning"></i>
                    </a>
                </td>
                <td>
                    <form action="{{route('product.destroy',$item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            
        @endforeach
    </tbody>
</table>
    
{{ $products->links() }}

@endsection

@section('sj')

<script>

    var listId = [];
    $('.de').click(function(e){
        
        let id = e.target.id;
       if(e.target.checked){
           listId.push(id);
        //    console.log(id);
       } else {
            var index = listId.indexOf(id);
            listId.splice(index,1) //splice cắt ptui cuối
       }
    })

    $('#deleteAll').click(function(){
       
       let deId = [];
        $('.de').each(function(){ //each: với mỗi ptu
            if($(this).is(':checked')){
                deId.push(($(this).attr('id')));
            }
           
        });

        if(confirm('ok')){
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('product.seletedDelete') }}",
            data : {'data':deId},
            type : 'POST',
            dataType : 'json',
            success : function(result){

                // console.log("===== " + result + " =====");
                // kieemr tra neeus no == true thif viet tiep goi lai
                let _html = '';
                console.log(result);
                result.product.data.map((item,index)=>{
                    console.log(item);
                   _html += `<tr >
                    <td><input id="${item.id}" class="de" name="sub" type="checkbox"></td>
                    <td scope="row">${index+1}</td>
                    <td>${item.name}</td>
                    <td>${item.slug}</td>
                    <td>${item.cateName}</td>
                    <td>${item.statusPro ? '<span class="btn btn-success">Còn hàng</span>' : 
                        '<span class="btn btn-danger">Hết hàng</span>'}</td>
                    <td>${item.price}</td>
                    <td>${item.sale_price}</td>
                    <td><img src="{{asset('storage/images')}}/${item.image}" width="100px" alt=""></td>
                    
                </tr>`
                })

                $('#hung').html(_html)

                let hungPi = '';
                console.log(result.product);
                result.product.links.map((i,it)=>{
                    hungPi += `
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" 
                            href="{{route('product.index')}}?page=${i.label}">${i.label}</a></li>
                    </ul>
                    `
                })
                $('.pagination').html(hungPi)

            }
        });
        }
        
    })
    
</script>

@endsection

