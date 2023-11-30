{{-- header --}}
<div class="container-fluid">
    <div class="row p-2">
        <div class="col-lg-2">
            <div class="logo">
                <a class="p-2 text-dark" href="{{route('admin.index')}}">
                    <i class="fa-solid fa-house p-1"></i>
                    ADMIN
                    <i class="fa-solid fa-house p-1"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6" style="border-block-end: 1px solid gray">
            
        </div>
        <div class="col-lg-4 header-right">
            <a class="p-2 text-primary" target="_blank" href="https://www.facebook.com/latibaby99/"><i class="fa-brands fa-facebook p-1"></i> Facebook</a> 
            <a class="p-2 text-dark" target="_blank" href="https://www.tiktok.com/"><i class="fa-brands fa-tiktok text-dark p-1"></i> Tiktok</a> 
            <a class="p-2 text-danger" target="_blank" href="https://www.youtube.com/channel/UComN6uk5wUAEQiIP37k8W3Q"><i class="fa-brands fa-youtube"></i> Youtube</a>
            @if (Auth::check())
                <a class="p-2 text-success" href="{{route('singOut')}}">
                    <i class="fa-solid fa-user"></i> Đăng xuất 
                </a>
            @else
                <a class="p-2 text-success btn btn-outline-success" href="{{route('logon')}}">
                    <i class="fa-solid fa-user"></i> Đăng nhập
                </a>
            @endif
        </div>
    </div>
    
</div>
{{-- header end --}}