

@extends('layoutadmin.admin')
 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý 
        <small>Sản phẩm</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
  
  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lý Sản phẩm</h3>
            </div><!-- /.box-header -->
            <?php
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message',null);
            }
            ?>
            <div class="box-body">
    
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Thương hiệu</th>
                    <th>Loại sản phẩm</th>
                    <th>Tác vụ</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($all_product as $key => $pro)
                  <tr>                
                    <td>{{ $pro->product_name}}</td>
                    <td>{{ $pro->product_price}}</td>
                    <td><img src="public/uploads/product/{{ $pro->product_image}}" height="100" width="100"></td>
                    <td>{{ $pro->product_trademark}}</td>
                    <td>{{$pro->category_name}}</td><!-- nha xuat ban-->

                    <td><a class="btn btn-primary" href="{{URL::to('/edit-product/'.$pro->product_id)}}">
                    <i class="fa fa-edit fa-lg"<acronym title="Chỉnh sửa"></acronym></i></a>               
                     <a class="btn btn-danger" onclick="return confirm('Bạn có thật sự muốn xóa không ?');" href="{{URL::to('/delete-product/'.$pro->product_id)}}">                   
                     <i class="fa fa-trash-o fa-lg" <acronym title="Xóa"></acronym></i></a></td>
                  </tr>
                  @endforeach        
                </tbody>     
              
              </table>
                      <div  style="text-align:left">
            <a class="btn btn-primary "href="{{URL::to('/add-product')}}">
      Thêm Sản phẩm</a>
</div>
            </div><!-- /.box-body -->
         
         
          </div><!-- /.box -->
        
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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

@section('script')
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    <script>
        function myFunction() {
            alert("Xóa thành công");
        }
    </script>
@endsection
  </body>
</html>
