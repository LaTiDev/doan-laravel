<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    {{--  --}}
    
    <link rel="stylesheet" href="{{asset('admin/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
@include('sweetalert::alert')

    @include('admin.layouts.header')

    
    {{-- sidebar --}}
      <div class="sidebar">
        <div class="container-fluid">
            <div class="row p-4">
                {{--  --}}
                <div class="col-lg-2 p-2">
                    <a href="{{route('admin.index')}}" class="text-dark p-2">
                        <div class="sidebar-menu text-center p-2">
                            <i class="fa-brands fa-windows"></i> Dashboard
                        </div>
                    </a>
                    <a href="{{route('category.index')}}" class="text-dark p-2">
                        <div class="sidebar-menu text-center p-2">
                            <i class="fa-solid fa-folder"></i> Danh mục
                        </div>
                    </a>
                    <a href="{{route('product.index')}}" class="text-dark p-2">
                        <div class="sidebar-menu text-center p-2">
                            <i class="fa-solid fa-folder"></i> Sản phẩm
                        </div>
                    </a>
                    <a href="{{route('order.index')}}" class="text-dark p-2">
                        <div class="sidebar-menu text-center p-2">
                          <i class="fa-solid fa-cart-plus"></i> Đơn hàng
                        </div>
                    </a>
                </div>
                {{--  --}}
                <div class="col-lg-10">
                  @yield('main')
                </div>
                {{--  --}}
            </div>
        </div>
      </div>
    {{-- sidebar end --}}
    
    @include('admin.layouts.footer')
      @yield('script')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('admin')}}/js/jav.js"></script>
    @yield('sj')
  </body>
</html>
