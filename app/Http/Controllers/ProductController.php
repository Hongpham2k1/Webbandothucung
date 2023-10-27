<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\ThemNxb;
use App\Models\Product;
session_start();
class ProductController extends Controller
{
    //hien ds sp
    public function all_product(){
        
        //$all_product = Product::with('themnxb')->orderBy('product_id', 'desc')->get();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->orderby('tbl_product.product_id', 'desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('adminlayout')->with('admin.all_product', $manager_product);
    }
    //them sp
    public function add_product(){
       
        $quanly_lsp = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        
        return view('admin.add_product')->with('quanly_lsp', $quanly_lsp);
    }
    //save sp vua them
    public function save_product(Request $request){
      
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['product_desc'] = $request->product_desc;
        $data['khuyen_mai'] = $request->khuyen_mai;
        $data['product_price_km'] = $request->product_price_km;
        $data['product_trademark'] = $request->product_trademark;
        $data['product_image']=$request->product_image;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));//có mục đích phan tách chuỗi khi gặp dau chấm
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image']='';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }
    //sua sp
    public function edit_product($product_id){
        
        $quanly_lsp = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('quanly_lsp', $quanly_lsp);
        return view('adminlayout')->with('admin.edit_product', $manager_product);
    }
    //update sp 
    public function update_product(Request $request,$product_id){
        
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;//nha xuat ban
        $data['product_desc'] = $request->product_desc;
        $data['khuyen_mai'] = $request->khuyen_mai;
        $data['product_price_km'] = $request->product_price_km;
        $data['product_trademark'] = $request->product_trademark;
        $data['product_image']=$request->product_image;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));//có mục đích phan tách chuỗi khi gặp dau chấm
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
        $data['product_image']='';
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');   
    }
    //xoa sp
    public function delete_product($product_id){
       
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');  
    }
}
