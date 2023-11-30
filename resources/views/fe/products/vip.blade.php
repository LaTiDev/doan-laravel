
<div class="container-fluid text-center">
    <h1 class="h1-dog">
        <i class="fa-solid fa-crown"></i> Sản phẩm cao cấp 
        <i class="fa-solid fa-crown"></i>
    </h1>
    <div class="show-food-products m-5 text-center">
        <div class="row">
        <!-- 1 -->
        @foreach ($stock as $item)
            <div class="col-lg-3 p-2">
                <div class="card">
                    <a href="{{route('detail',$item->slug)}}">
                        <img class="card-img-top" src="{{asset('storage/images')}}/{{$item->image}}" alt="">
                    </a>
                    <div class="card-body">

                        <div class="hv-products">
                            <a href="{{route('detail',$item->slug)}}">
                                <h2 class="card-title">{{$item->category->name}}</h2>
                            </a>
                            @if ($item->sale_price > 0)
                                <del>{{number_format($item->price)}}</del>
                                <br>
                                <span>{{number_format($item->sale_price)}} VND</span>
                            @else
                                <del>{{number_format($item->price)}}</del>
                            @endif
                            <form action="{{route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button class="cart-click btn" type="submit">
                                    <span class="text-success">Mua nhanh</span>
                                    <i class="fa-solid fa-cart-shopping icon-card"></i>
                                </button>
                            </form>
                        </div>

                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            @if ($item->sale_price > 0)
                                <div class="product-label label-sale">
                                    {{percent($item->sale_price,$item->price)}}%
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>


    <!-- show food products end -->
</div>