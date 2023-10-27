<header class="main-header">
  <!-- Logo -->
  <a href="{{URL::to('/dashboard')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Pepshop online</b>S</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Pepshop online</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="top-nav clearfix">
      <ul class="nav pull-right top-menu">
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="username">Tài khoản admin <i class="fa fa-caret-down"></i></span>
          </a>
          <ul class="dropdown-menu extended logout">
            <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
