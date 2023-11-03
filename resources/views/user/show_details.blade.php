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


	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Product Page///////////////////-->
	<!--//////////////////////////////////////////////////-->
	<div id="page-content" class="single-page">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
						<li><a href="#">Chi tiết sản phẩm</a></li>
						
					</ul>
				</div>
			</div>
			<div class="row">
                @foreach ($details_product as $key => $product)
				<div id="main-content" class="col-md-8">
					<div class="product">
						<div class="col-md-6">
							<div class="image">
								<img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" height="300" width="300" alt="" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="caption">
								<div class="name"><h5>{{$product->product_name}}</h5></div>
								<div class="info">
									<ul>
										<li>Thương hiệu: {{$product->product_trademark}}<b></b></li>
										<li>Loại sản phẩm: {{$product->category_name}}<a href=""></a> <h3></li>
                                   	
									</ul>
								</div>
				
								
								<form name="form3" id="ff3" method="POST" action="{{URL::to('/save-cart')}}">
                                    {{ csrf_field() }}
									<p>Giá sản phẩm: {{number_format($product->product_price).' '.'VND'}}</p>
									<p style="color:red">Giá khuyến mãi: {{number_format($product->product_price_km).' '.'VND'}}</p>
									<label>Số lượng:</label>
										<input class="form-inline quantity" style="margin-right: 80px;width:50px" name="qty" type="number" min="1" value="1"/>
								<input type="submit" name="submit" id="add-to-cart" class="btn btn-2" value="Thêm vào giỏ hàng" />
								<!--<a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Mua ngay</a>-->
								<input type="hidden" name="productid_hidden" value="{{$product->product_id}}" />
								
								</form>
								
							</div>
						</div>
						<div class="clear"></div>
					</div>	
					<div class="product-desc">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#description">Thông tin sản phẩm</a></li>
						</ul>
						<div class="tab-content">
							<div id="description" class="tab-pane fade in active">
								
								<div innerHTML>
                      <p> {{$product->product_desc}}</p>
                    </div>						
							</div>
							
						</div>
					</div>
	
						<div class="clear"></div>
					</div>

				</div>
	
			</div>
            @endforeach
		</div>
	</div>	

    @endsection  
	<!-- IMG-thumb -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	<script>
	$(document).ready(function(){
		$(".nav-tabs a").click(function(){
			$(this).tab('show');
		});
		$('.nav-tabs a').on('shown.bs.tab', function(event){
			var x = $(event.target).text();         // active tab
			var y = $(event.relatedTarget).text();  // previous tab
			$(".act span").text(x);
			$(".prev span").text(y);
		});
	});
	</script>
</body>
</html>
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
    // document.getElementById("add-to-cart").onclick = function(){
    // 	setTimeut(function(){
    // 		window.location.replace("http://localhost/MobileShop/cart.php");
    // 	}, 2000);
    // }
</script>

