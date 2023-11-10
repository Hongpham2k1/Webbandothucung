

@extends('layoutadmin.admin')
 
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Quản lý
            <small>Đơn hàng</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Quản lý</a></li>
            <li class="active">Quản lý đơn hàng</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
      

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Quản lý đơn hàng</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead >
                      <tr>
                        <th>Tên người mua hàng</th>
                        <th>Tổng giá tiền</th>
                        <th>Tình trạng</th>
                        <th>Tác vụ</th>
                      </tr>
                    </thead>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    @foreach ($all_order as $key => $order)
                    
                
                    <tr>                
                        <td>{{ $order->customer_name}}</td>
                        <td>{{ $order->order_total}}</td>
                        <td>{{ $order->order_status}}</td>
                        <td><a class="btn btn-primary" href="{{URL::to('/view-order/'.$order->order_id)}}">
                        <i class="fa fa-edit fa-lg"<acronym title="Chỉnh sửa"></acronym></i></a>               
                         <a class="btn btn-danger" onclick="return confirm('Bạn có thật sự muốn xóa đơn hàng không ?');" href="{{URL::to('/delete-order/'.$order->order_id)}}">                   
                         <i class="fa fa-trash-o fa-lg" <acronym title="Xóa"></acronym></i></a></td>
                      </tr> 
                      @endforeach               
                  </table>         
                         
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
            
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        <!-- /.content -->
      </div><!-- /.content-wrapper -->
      @endsection
 <!-- Control Sidebar -->

 <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <script src="{{asset('public/Admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('public/Admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('public/Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/Admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('public/Admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('public/Admin/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public/Admin/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('public/Admin/dist/js/demo.js')}}"></script>
    <!-- page script -->


  </body>
</html>
