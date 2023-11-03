@extends('layoutuser.user')
 
@section('title')
 <title>Trang chu</title>

@endsection
 
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
@include('partialsuser.sider')

<div id="page-content" class="single-page">
    <div class="container">
        
	<div class="row">
				<div class="col-lg-12">
					<div class="heading"><h5>Sản phẩm đang khuyến mãi</h5></div>
                    <div class="product-container"></div>
                   
	               @foreach ($km_product as $key => $product)
                   <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}" >
				
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" height="300" width="300" alt=""/>
                                       
                                        <p>{{$product->product_name}}</p>
    
                                        <div class="price" ><span style="text-decoration: line-through">{{number_format($product->product_price).' '.'VND'}}<span style="font-size: 14px;"></div>
                                            <div class="price" >{{number_format($product->product_price_km).' '.'VND'}}<span style="font-size: 14px;"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                      </a>
                    
                        @endforeach
				</div>
	</div>
		
    
            
     <div class="row">
        <div class="col-lg-12">
            <div class="heading"><h5>Sản phẩm khác</h5></div>
            <div class="product-container"></div>
            @foreach ($all_product as $key => $value)
                <a href="{{ URL::to('chi-tiet-san-pham/'.$value->product_id) }}">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ URL::to('public/uploads/product/'.$value->product_image) }}" height="300" width="300" alt=""/>
                                    <p>{{ $value->product_name }}</p>
                                    <div class="price">{{ number_format($value->product_price).' '.'VND' }}</div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    
</div>
</div>
@endsection     
<style>
    .product-image-wrapper {
        text-align: center;
      }
      
      .productinfo {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      
      .productinfo img {
        height: 300px;
        width: 300px;
        object-fit: cover;
        margin-bottom: 10px;
      }
      
      .productinfo p {
        margin-bottom: 5px;
      }
      
      .price {
        font-size: 14px;
      }

.product-item {
    margin-right: 20px; /* Khoảng cách giữa các sản phẩm theo chiều ngang */
}



    </style>
   
    
    
