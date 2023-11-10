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


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>

        <div class="register-req">
            <p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin gửi hàng</p>
                        <div class="form-one">
                            <form method="POST" action="{{URL::to('save-checkout-customer')}}">
                                {{ csrf_field() }}
                                <input type="text" name="shipping_email" class="shipping_email" placeholder="Điền email">
                                <input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên người mua hàng">
                                <input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ gửi hàng">
                                <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
                                <textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                                <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                            </form>
                     
                    </div>
                </div>
                                
            </div>
        </div>
    
    </div>
    
</div>
<style>
    

</section> <!--/#cart_items-->

@endsection