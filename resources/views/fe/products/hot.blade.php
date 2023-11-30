
<h1><i class="fa-solid fa-truck-fast"></i> Sản phẩm bán chạy 
    <i class="fa-solid fa-truck-fast"></i>
</h1>
<!-- owl-carousel -->
<!-- owl-carousel: chia trang -->
<!-- 1 -->
<div class="owl-carousel owl-theme product-home m-5 text-center">

    @foreach ($stock as $item)
        <div>
            <div class="card">
                <a href="{{route('detail',$item->slug)}}">
                    <img class="card-img-top" src="{{asset('storage/images')}}/{{$item->image}}" alt="">
                </a>
                <div class="card-body">
                    <div class="dv">
                        <a href="{{route('detail',$item->slug)}}">
                            <div class="card-title">{{$item->category->name}}</div>
                        </a>
                        @if ($item->sale_price > 0)
                            <del>{{number_format($item->price)}}</del>
                            <br>
                            <span>{{number_format($item->sale_price)}} VND</span>
                        @else
                            <del>{{number_format($item->price)}}</del>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>