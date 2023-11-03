@extends('layoutuser.user')
@section('content')

<section id="cart_items">
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
		<div class="container">
			
			<div class="review-payment">
				<h5>Cảm ơn bạn đã đặt hàng ở chỗ chúng tôi!</h5>
				<h5>	Chúng tôi sẽ liên hệ với bạn sớm nhất</h5>
			</div>
			
			
			
		</div>
	</section> <!--/#cart_items-->

@endsection