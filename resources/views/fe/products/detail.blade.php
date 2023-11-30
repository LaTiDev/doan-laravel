@extends('fe.home')
@section('title','LaTi | DETAILS')
@section('main')

<div class="container">
    {{--  --}}
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}">
                    <i class="fa-solid fa-house text-dark"></i>
                </a>
            </li>
            <li class="breadcrumb-item">SẢN PHẨM</li>
            <li class="breadcrumb-item text-danger">Chi tiết sản phẩm</li>
        </ol>
    </nav>

    {{--  --}}
    <div class="banner-products d-flex justify-content-center align-items-center">
        <div class="banner-name-products text-center" style="border-bottom: 2px solid rgb(170, 163, 163)">
            <h1>
                <i class="fa-regular fa-heart"></i> 
                Chi tiết sản phẩm 
                <i class="fa-regular fa-heart"></i>
            </h1>
        </div>
    </div>
    {{--  --}}

    <div class="details p-2">
        <div class="row">
            {{--  --}}
            <div class="col-lg-4">
                <div class="show-product p-2">
                    <img src="{{asset('storage/images')}}/{{$product->image}}" class="w-100" alt="">
                    <div class="row">
                        <div class="col-lg-4 d-flex m-2 photos">
                            @foreach ($product->images as $item)
                                <div class="show-product p-2">
                                    <img src="{{asset('storage/images')}}/{{$item->image}}"  width="130px" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
            <div class="col-lg-8">
                <div class="detail-products">
                    <h1 class="text-center">{{$product->name}}</h1>
                    <div class="details_rating text-center">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        <span>(20 reviews)</span>
                    </div>
                    <div class="details_price">
                        <del>{{number_format($product->price)}}</del> 
                        <span>{{number_format($product->sale_price)}}</span> VND
                    </div>
                    <div class="details_description">
                        <span class="text-uppercase">Chi tiết sản phẩm :</span>
                        <br>
                        {{$product->description}}
                    </div>
                    <!-- add to cart -->
                    <div class="d-flex detail-cart">    
                        <div class="row">
                            <form action="{{route('cart.add')}}"  method="POST">    
                                @csrf  
                                <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="quantity align-items-center col-lg-4">
                                <div class="mb-3 d-flex so">
                                    <span class="input-group-text bg-success" onclick="decreaseValue()">-</span>
                                    <input type="text" class="form-control text-center" name="quantity" id="number" value="1" style="width: 40px">
                                    <span class="input-group-text bg-success" onclick="increaseValue()">+</span>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-outline-success text-uppercase add-cart">add to cart</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    {{--  --}}
                </div>
            </div>
            {{--  --}}
        </div>
    </div>

    <div class="container text-center">
        <h1 class="h1-go">
            <i class="fa-regular fa-star"></i> 
                Sản phẩm tương tự <i class="fa-regular fa-star">
            </i>
        </h1>
        <div class="row p-2">

            @foreach ($related as $item)
                <div class="col-lg-3 dog">
                    <div class="card">
                        <a href="{{route('detail',$item->slug)}}">
                            <img class="card-img-top" src="{{asset('storage/images')}}/{{$item->image}}" alt="">
                        </a>
                        <div class="card-body">
                            <div class="dog-hv">
                                <a href="{{route('detail',$item->slug)}}">
                                    <h4 class="card-title">{{$item->name}}</h4>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
            @endforeach
           
        </div>
    </div>
    
</div>

@endsection

@section('script')
<script>
    
    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
        }

        function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;
    }

</script>
@endsection
