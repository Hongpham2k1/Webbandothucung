<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header"></li>
      <li class="active treeview">
        <li class="active">
          <a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Trang quản trị</a>
        </li>
      </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-table"></i> <span>Quản lý</span>
          <i class="fa fa-angle-down pull-right"></i>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <li><a href="{{URL::to('/all-product')}}"><i class="fa fa-circle-o"></i> Quản lý Sách</a></li>
          <li><a href="{{URL::to('/quanlyloaisp')}}"><i class="fa fa-circle-o"></i> Quản lý Loại sản phẩm</a></li>
        <!--  <li><a href="quanlydv.php"><i class="fa fa-circle-o"></i> Quản lý dịch vụ</a></li> -->
        </ul>
      </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-external-link"></i> <span>Danh Sách</span>
          <i class="fa fa-angle-down pull-right"></i>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <li><a href="{{URL::to('/manage-order')}}"><i class="fa fa-circle-o"></i> Danh Sách hóa đơn</a></li>
          <li><a href="{{URL::to('/manage-customer')}}"><i class="fa fa-circle-o"></i> Danh Sách khách hàng</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
