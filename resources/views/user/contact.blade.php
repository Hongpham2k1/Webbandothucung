
@extends('layoutuser.user')
 

 
@section('content')
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                    <li><a href="{{URL::to('/contact')}}">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading"><h1>Liên hệ với chúng tôi</h1></div>
            </div>
            <div class="col-md-6">
                <p><span class="glyphicon glyphicon-home"></span> 79 Ngụy Như Kon Tum, Làng sinh viên Hacinco, Nhân Chính, Thanh Xuân, Hà Nội.</p>
                <p><span class="glyphicon glyphicon-earphone"></span> 0123456789</p>
                <p><span class="glyphicon glyphicon-envelope"></span></p>
                <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=450&amp;hl=en&amp;q=Làng Sinh viên Hacinco, Nhà Sách-Nhóm 6, Ngõ 90 Ngụy Như Kon Tum, Làng sinh viên Hacinco, Nhân Chính, Thanh Xuân, Hà Nội&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://formatjson.org/">format json</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:450px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:450px;}.gmap_iframe {width:600px!important;height:450px!important;}</style></div>
            </div>
        </div>
    </div>
</div>
@endsection


