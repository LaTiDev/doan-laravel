
@extends('fe.home')
@section('title','LOGIN | LaTi')
@section('main')
    
<div class="container">

    <div class="d-flex justify-content-center p-5">
        <div class="card">
            <!-- card-header -->
            <div class="card-header">
                <h3>Đăng nhập</h3>
            </div>
            <!-- card-header end-->
            <!-- card-body -->

            <div class="card-body text-center">

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                @endif

                <form method="POST">
                    @csrf
                    <!-- user -->
                    <div class="user d-flex justify-content-around align-items-center p-3">
                        <div class="input-login p-2">
                            <span class="input-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="Nhập email">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <!-- user end-->

                    <!-- password -->
                    <div class="login d-flex justify-content-around align-items-center p-3">
                        <div class="input-login p-2">
                            <span class="input-text"><i class="fa-solid fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <!-- password end -->

                    <!-- remember -->
                    <div class="row align-items-center remember m-2">
                        <input class="m-2" type="checkbox">Remember Me
                    </div>
                    <!-- remember end -->

                    <!-- login -->
                    <div class="form-group m-2">
                        <button type="submit" class="btn btn-outline-success w-75 m-1">Đăng nhập</button>
                    </div>
                    <!-- login end -->
                    <a href="" class="text-danger">Bạn quên mật khẩu ?</a>

                    <!-- register -->
                    <div class="form-group m-2 register">
                        <a class="btn btn-outline-danger" href="{{route('register')}}">Đăng ký <i class="fa-regular fa-hand-peace"></i></a>
                    </div>
                    <!-- register end -->

                </form>
            </div>
            <!-- card-body end-->
        </div>
    </div>

</div>

@endsection