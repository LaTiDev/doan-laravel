<!-- header -->
<header>

    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- header-top-left start -->
                <div class="col-lg-9">
                    <div class="header-top-left p-2">
                        <a href="{{route('index')}}"><i class="fa-solid fa-house"></i></a>
                        <span>||</span>
                        <i class="fa-regular fa-heart"></i>
                        <a>
                            Chào mừng 
                            @if (Auth::check())
                                <span class="user text-uppercase">{{Auth::user()->name}} </span>
                            @else
                                <span class="user"></span>
                            @endif 
                            đến với website của tớ

                        </a>
                        <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <!-- header-top-left end -->
                <!-- header-top-right start -->
                <!-- target="_blank" day trang khac -->
                <div class="col-lg-3">
                    <div class="right header-top-right p-2 d-flex justify-content-between align-items-center">
                        <a target="_blank" href="https://www.facebook.com/latibaby99/"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a target="_blank" href="https://twitter.com/LaTibaby99"><i
                                class="fa-brands fa-twitter"></i></a>
                        <a target="_blank" href="https://www.youtube.com/channel/UComN6uk5wUAEQiIP37k8W3Q"><i
                                class="fa-brands fa-youtube"></i></a>
                        <div class="login">
                            @if (Auth::check())
                                <a href="{{route('logout')}}">
                                    <i class="fa-solid fa-user"> Logout</i> 
                                </a>
                            @else
                                <a href="{{route('login')}}">
                                    <i class="fa-solid fa-user"> Login</i> 
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- header-top-right end -->
            </div>
        </div>
    </div>
    <!-- header end-->
    
</header>
