<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="robots" content="all,follow">
    <meta name="description" content="Học Lập trình fullstack miễn phí (HTML,JAVASCRIPT, PHP, JAVA, NODESJS, vvv)">
     <meta name="keywords" content="mosoftvn, Học lập trình miễn phí, PHP/Laravel, HTML/CSS/JS, JAVA, NODEJS">
    <title>LaTi | Logon</title>
    <link rel="icon" type="image/png" href="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-9/101981291_284656059331050_9025020117699063163_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=0bb214&_nc_ohc=Pte2eGVFWrYAX9MlcnJ&_nc_ht=scontent.fhan2-4.fna&oh=00_AfAdHfdGgEGZYtfxbhg-i2irKx3-10ioDN64Rgd5_SDaog&oe=6566D065">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel='stylesheet'>
    <link href='https://mosoftvn.com/assets/vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="https://mosoftvn.com/assets/css/vertical-responsive-menu.min.css" rel="stylesheet">
    <link href="https://mosoftvn.com/assets/css/style.css" rel="stylesheet">
    <link href="https://mosoftvn.com/assets/css/responsive.css" rel="stylesheet">
    <link href="https://mosoftvn.com/assets/css/night-mode.css" rel="stylesheet">
    <link href="https://mosoftvn.com/assets/css/instructor-dashboard.css" rel="stylesheet" />
    <link href="https://mosoftvn.com/assets/css/instructor-responsive.css" rel="stylesheet" />
    <link href="https://mosoftvn.com/assets/css/night-mode.css" rel="stylesheet" />
    <link href="https://mosoftvn.com/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://mosoftvn.com/assets/vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="https://mosoftvn.com/assets/vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="https://mosoftvn.com/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://mosoftvn.com/assets/vendor/semantic/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .is-invalid{
            border: 1px solid red !important;
        }
    </style>
</head>

<body>

    <div class="sign_in_up_bg">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center">
                {{--  --}}
                <div class="col-lg-12">
                    <div class="main_logo25">
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
                {{--  --}}
                <div class="col-lg-6 col-md-8">
                    <div class="sign_form">
                        <h1>Đăng nhập</h1>
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                        <form method="POST" action="">
                            @csrf
                            <input type="hidden">

                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" value="{{old('email')}}" type="text" name="email" placeholder="Email">
                                </div>
                            </div>
                            @error('email')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
            
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="password" name="password" placeholder="Mật khẩu">
                                    <a class="m-2 text-danger" href="">Bạn quên mật khẩu ?
                                        <i class="fa-solid fa-computer-mouse text-danger"></i>
                                    </a>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                    
                            <button class="login-btn" type="submit">Đăng nhập</button>
                            Bạn chưa có tài khoản ?
                            <a class="btn btn-outline-success m-2" href="{{route('signUp')}}">Tạo tài khoản mới <i class="fa-regular fa-face-grin-hearts"></i></a>
                            <br>
                            <a class="btn btn-outline-dark" href="{{route('index')}}"><i class="fa-solid fa-rotate-left"></i> Trở về trang người dùng</a>
                        {{--  --}}
                        </form>
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
    </div>
    
    <script src="https://mosoftvn.com/assets/js/vertical-responsive-menu.min.js"></script>
    <script src="https://mosoftvn.com/assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://mosoftvn.com/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://mosoftvn.com/assets/vendor/OwlCarousel/owl.carousel.js"></script>
    <script src="https://mosoftvn.com/assets/vendor/semantic/semantic.min.js"></script>
    <script src="https://mosoftvn.com/assets/js/custom.js"></script>
    <script src="https://mosoftvn.com/assets/js/night-mode.js"></script>

</body>

</html>
