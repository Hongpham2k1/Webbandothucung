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

    
    </div>
    <div class="review-payment">
        <h5>Xem lại giỏ hàng</h5>
    </div>
    <div class="table-responsive cart_info">
        <?php
        $content = Cart::content();
        
        ?>
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Hình ảnh</td>
                    <td class="description">Tên sách</td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số lượng</td>
                    <td class="total">Tổng</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($content as $v_content)
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="150" height="150" alt="" /></a>
                    </td>
                    <td class="cart_description">
                        <h6><a href="">{{$v_content->name}}</a></h6>
                        
                    </td>
                    <td class="cart_price">
                        <p>{{number_format($v_content->price).' '.'vnđ'}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                {{ csrf_field() }}
                            <input class="form-inline quantity" style="margin-right: 80px;width:50px" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
                            <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                            <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                            </form>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">
                            
                            <?php
                            $subtotal = $v_content->price * $v_content->qty;
                            echo number_format($subtotal).' '.'vnđ';
                            ?>
                        </p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h4 style="margin: 40px 0;font-size: 20px"> Chọn hình thức thanh toán</h4>
    <form method="POST" action="{{URL::to('/order-place')}}">
        {{ csrf_field() }}
    <div class="payment-options">

        <span>
            <label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
        </span>
        <span>
            <label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
        </span>
        <input type="submit" value="Đặt hàng" name="send_order" class="btn btn-primary btn-sm">
    </div>
    </form>
</div>


</section> <!--/#cart_items-->

@endsection