
@include('partialsuser.head')

<body>


<nav id="top"> 
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
				
				</div>
				<div class="col-xs-6">
					<ul class="top-link">
						
	<?php
	$customer_id = Session::get('customer_id');
	if($customer_id!=NULL){
		$username = Session::get('customer_name');
		?>
         <li><span class="glyphicon glyphicon-user"></span> Xin chào <span style="color:Tomato;"><b>{{ $username }}</b></span></li>
		 <li><span class="glyphicon glyphicon-log-out"></span><a href="{{URL::to('/logout-checkout')}}"> Đăng xuất!</a></li>
		<?php
	}else{
		?>
          <li><a href="{{URL::to('/login-checkout')}}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
		<?php
	}
	?>	
	<li><a href="{{URL::to('/contact')}}"><span class="glyphicon glyphicon-envelope"></span> Liên hệ</a></li>				
   		
					</ul>
				</div>
			</div>
		</div>
    </nav>
    </body>
</html>
