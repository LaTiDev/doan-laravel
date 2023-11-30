
@extends('fe.home')
@section('title','REGISTER | LaTi')
@section('main')
    
    <div class="container">
        <div class="d-flex justify-content-center p-5">
            <div class="card">
                <!-- card-header -->
                <div class="card-header text-center">
                    <h3>Tạo tài khoản mới</h3>
                    <p>Nhanh chóng và dễ dàng <i class="fa-regular fa-face-smile-wink"></i></p>
                </div>
                <!-- card-header end-->
    
                <!-- card-body -->
                <div class="card-body text-center">
                    <form method="POST">
                        @csrf
                        <!-- user -->
                        <div class="user d-flex justify-content-around align-items-center p-3">
                            <div class="input-login p-2">
                                <span class="input-text"><i class="fa-solid fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{old('name')}}" placeholder="Tên người dùng" name="name">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
    
                        <div class="user d-flex justify-content-around align-items-center p-3">
                            <div class="input-login p-2">
                                <span class="input-text"><i class="fa-regular fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
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
                            <input type="password" name="password" class="form-control m-2" placeholder="Nhập mật khẩu">
                            <input type="password" name="password" class="form-control m-2" placeholder="Nhập lại mật khẩu">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!-- password end -->
                        <!-- login -->
                        <div class="form-group m-2">
                            <button type="submit" class="btn btn-outline-success w-75 m-1">Đăng ký</button>
                        </div>
                        <!-- login end -->
                        Bạn đã có tài khoản ?
    
                        <!-- register -->
                        <div class="form-group m-2 register">
                            <a class="btn btn-outline-primary" href="{{route('login')}}">Đăng nhập ngay <i class="fa-solid fa-heart"></i></a>
                        </div>
                        <!-- register end -->
    
                    </form>
                </div>
                <!-- card-body end-->
            </div>
        </div>
    </div>

@endsection