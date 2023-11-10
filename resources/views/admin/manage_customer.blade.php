

@extends('layoutadmin.admin')
 
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Quản lý
            <small>Khách hàng</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Quản lý</a></li>
            <li class="active">Khách hàng</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
      

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Thông tin Khách hàng</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead >
                      <tr>
                        <th>Tên khách hàng </th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                      </tr>
                    </thead>
                    @foreach ($manage_customer as $key => $manage_customer)
                    <tr>                
                        <td>{{$manage_customer->customer_name}}</td>
                        <td>{{$manage_customer->customer_email}}</td>
                        <td>{{$manage_customer->customer_phone}}</td>
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
