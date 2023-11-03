
@extends('layoutadmin.admin')
 
@section('title')
 <title>Trang chu</title>

@endsection
 
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Trang quản trị
      <small>Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Trang quản trị</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
          <h3>Quản lý</h3>
            <p>Sản phẩm</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{URL::to('/all-product')}}" class="small-box-footer">xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
          <h3>Quản lý</h3>
            <p>Loại sản phẩm</p>
          </div>
          <div class="icon">
            <i class="ion-ios-home"></i>
          </div>
          <a href="{{URL::to('/quanlyloaisp')}}" class="small-box-footer">xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
          <h3>Danh Sách</h3>
            <p>Khách hàng</p>
          </div>
          <div class="icon">
            <i class="ion-person-stalker"></i>
          </div>
          <a href="{{URL::to('/manage-customer')}}" class="small-box-footer">Xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
          <h3>Danh Sách</h3>
            <p>Hóa đơn</p>
          </div>
          <div class="icon">
            <i class="ion-printer"></i>
          </div>
          <a href="{{URL::to('/manage-order')}}" class="small-box-footer">Xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      </div><!-- /.row -->
    <!-- Main row -->
  
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection 

    

