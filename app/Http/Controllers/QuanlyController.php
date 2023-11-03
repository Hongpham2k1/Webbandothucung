<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class QuanlyController extends Controller
{
    //nha xuat ban 

   //hien ds loaisp
   public function quanlyloaisp(){
        
    $quanly_lsp = DB::table('tbl_category_product')->get();
    $manager_lsp = view('admin.quanlyloaisp')->with('quanly_lsp', $quanly_lsp);
    return view('adminlayout')->with('admin.quanlyloaisp', $manager_lsp);
}

//them loaisp
public function themlsp(){
    
    return view('admin.themlsp');
}
//save loaisp vua them
public function save_themlsp(Request $request){
   
    $data = array();
    $data['category_name'] = $request->category_product_name;
    $data['category_desc'] = $request->category_product_desc;
    DB::table('tbl_category_product')->insert($data);
    Session::put('message','Thêm loại sản phẩm thành công');
    return Redirect::to('themlsp');
}
//sua loaisp
public function sualsp($category_product_id){
   
    $sua_lsp = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
    $manager_lsp = view('admin.sualsp')->with('sua_lsp', $sua_lsp);
    return view('adminlayout')->with('admin.sualsp', $manager_lsp);
}

//update loaisp
public function update_lsp(Request $request,$category_product_id){
    
    $data = array();
    $data['category_name'] = $request->category_product_name;
    $data['category_desc'] = $request->category_product_desc;
    DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
    Session::put('message','Cập nhật Loại sản phẩm thành công');
    return Redirect::to('quanlyloaisp');   
}

//xoa loaisp
public function xoa_lsp($category_product_id){
    
    DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
    Session::put('message','Xóa Nhà xuất bản thành công');
    return Redirect::to('quanlyloaisp');  
}
//ket thuc admin page

//show danh mục nxb
public function show_category_home($category_id){
    $quanly_nxb = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
    $category_by_id_km = DB::table('tbl_product')->where('khuyen_mai','1')
    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    ->where('tbl_product.category_id',$category_id)->get();
    $category_by_id = DB::table('tbl_product')->where('khuyen_mai','0')
    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    ->where('tbl_product.category_id',$category_id)->get();

    return view('user.show_category')->with('quanly_nxb', $quanly_nxb)->with('category_by_id_km',$category_by_id_km)->with('category_by_id',$category_by_id);
}
}
