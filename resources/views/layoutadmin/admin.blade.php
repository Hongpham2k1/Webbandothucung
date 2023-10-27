<html>

@include('partialsadmin.head') 



<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
@include('partialsadmin.header')     
@include('partialsadmin.aside')
@yield('content')
@include('partialsadmin.footer')
    
</html>
