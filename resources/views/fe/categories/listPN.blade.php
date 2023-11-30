@extends('fe.home')
@section('title','LaTi | CATEGORIES')
@section('main')

<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}">
                    <i class="fa-solid fa-house text-dark"></i>
                </a>
            </li>
            @foreach ($categories as $item)
                <li class="breadcrumb-item">
                    <a href="{{route('listPN.index',$item->id)}}" class="text-dark">
                        {{$item->name}}
                    </a>
                </li>
            @endforeach
        </ol>
    </nav>

    {{--  --}}
    <div class="banner-products d-flex justify-content-center align-items-center">
        <div class="banner-name-products text-center" style="border-bottom: 2px solid rgb(170, 163, 163)">
            <h1>
                <i class="fa-regular fa-heart"></i> 
                {{$categoriesName->name}} 
                <i class="fa-regular fa-heart"></i>
            </h1>
        </div>
    </div>
    {{--  --}}

    <div class="row">
        @foreach ($productLists as $productList)
            @foreach ($productList as $item)
            <div class="col-lg-3 p-2">
                <div class="card">
                    <a href="{{route('detail',$item->slug)}}">
                        <img class="card-img-top" src="{{asset('storage/images')}}/{{$item->image}}" alt="">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                    </div>
                    <strong class="card-text text-center">{{number_format($item->price)}}</strong>

                </div>
            </div>
            @endforeach
        @endforeach
        
    </div>
</div>

@endsection