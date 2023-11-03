
	

	<header class="container">
		<div class="row">
			<div class="col-md-4" style="margin-bottom:25px">
				<div id="logo"><h5>PETSHOP ONLINE</h5></div>
			</div>
			<div class="col-md-4">
				<form class="form-search" method="POST" action="{{URL::to('/tim-kiem')}}">  
					{{ csrf_field() }}
					<input type="text"  class="input-medium search-query" name="keywords_submit" required>  
					<button type="submit" name="search_items" class="btn"><span class="glyphicon glyphicon-search"></span></button>  
				</form>
			</div>
			<div class="col-md-4">
				<div id="cart"><a class="btn btn-1" href="{{URL::to('/show_cart')}}"><span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng </a></div>
			</div>
		</div>
	</header>
	




