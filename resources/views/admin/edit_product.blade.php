@extends('layoutadmin.admin')
 
@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sửa
            <small>Sản phẩm</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Trang quản trị</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Sửa Sản phẩm</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
              
                @foreach ($edit_product as $key => $pro)
               
                <form class="form-horizontal"  method="POST" action="{{URL::to('/update-product/'.$pro->product_id)}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="product_name" value="{{$pro->product_name}}" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="product_image" >
                        <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                      </div>
                      </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Thương hiệu</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="product_trademark" value="{{$pro->product_trademark}}" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Loại sản phẩm</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="product_cate">
                      @foreach ($quanly_lsp as $key => $lsp)
                      @if($lsp->category_id == $pro->category_id)
                      <option selected="selected" value="{{$lsp->category_id}}">{{$lsp->category_name}}</option>
                      
                      @else
                      <option value="{{$lsp->category_id}}">{{$lsp->category_name}}</option>   
                      @endif
                      @endforeach
                  
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Giá</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="product_price" required value="{{$pro->product_price}}">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Khuyến mãi</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="khuyen_mai">
                    <option selected="selected" value="1">Có khuyến mãi</option>
                    <option  value="0">Không khuyến mãi</option>
                    </select>
                    </div>
                    </div>
                
                    

                                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Giá khuyến mãi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="product_price_km" value="{{$pro->product_price_km}}">
                    </div>
                    </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                    <textarea id="editor1"  name="product_desc"  rows="10" cols="80">{{$pro->product_desc}}
                    
                    </textarea>
                    </div>
                  </div>
               
                  <div class="box-footer">
                  <a href="{{URL::to('/all-product')}}"><button type="button" name="cancel" class="btn btn-default">Cancel</button></a>
                    <button type="submit" name="update_product" class="btn btn-info pull-right">Cập nhật sản phẩm</button>
                    </div><!-- /.box-body -->
                  </div><!-- /.box-footer -->
                </form>
                     
                @endforeach
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            <!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
           
      

      </div><!-- /.content-wrapper -->
  
      @endsection    
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('public/Admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('public/Admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('public/Admin/plugins/fastclick/fastclick.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public/Admin/dist/js/app.min.js')}}"></script>
    @section('script')
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    @endsection
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('public/Admin/dist/js/demo.js')}}"></script>
  </body>
</html>


