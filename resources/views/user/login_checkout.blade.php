@extends('layoutuser.user')
 
 
@section('content')
<nav id="menu" class="navbar">
    <div class="container">
        <div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
          <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Loại sản phẩm</a>                   
                    @foreach ($quanly_nxb as $key => $nxb)
                    <div class="dropdown-menu">
                        <div class="dropdown-inner">
                            <ul class="list-unstyled">
								<li><a href="{{URL::to('/loai-san-pham/'.$nxb->category_id)}}">{{$nxb->category_name}}</a></li>
                                                               
                            </ul>
                    @endforeach
                </div>
            </div>
        </li>
                    
            <li><a href="{{URL::to('/show_cart')}}">Giỏ hàng</a></li>
        <li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
                            
            </ul>
        </div>
    </div>
</nav>

<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                    <li><a href="{{URL::to('/login-checkout')}}">Account</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="heading"><h2>Đăng nhập</h2></div>
                <form name="form1" id="ff1" method="POST" action="{{URL::to('/login-customer')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email_account" required value="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password_account"required value="">
                    </div>
                    <button type="submit" name="submit" class="btn btn-1" name="login" id="login">Đăng nhập</button>
                    <P style="color:red"></p>
                    <a href="#"></a>
                    <br>
                <i>* Bạn chưa có tài khoản? Vui lòng đăng ký.</i>
                </form>
            </div>
            <div class="col-md-6">
                <div class="heading"><h2> Đăng ký tài khoản</h2></div>
                <form name="form2" id="ff2" method="POST" action="{{URL::to('/add-customer')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Họ và Tên" name="customer_name" id="firstname" value="" required >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="customer_email" id="email"  value="" required>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Điện thoại" name="customer_phone" id="phone" value="" required >
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="customer_password" id="password"  value=""required >
                    </div>
                    
                    <button type="submit" name="dangky" class="btn btn-1">Đăng ký</button>
                    <P style="color:red"></p>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection