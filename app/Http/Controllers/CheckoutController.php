<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Query\Builder;
use App\Models\ThemNxb;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

use function Ramsey\Uuid\v1;

session_start();
class CheckoutController extends Controller
{
    public function login_checkout(){
        $quanly_nxb = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        return view('user.login_checkout')->with('quanly_nxb', $quanly_nxb);
    }
    
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/trang-chu');
    }
    public function checkout(){
        $quanly_nxb = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        return view('user.checkout')->with('quanly_nxb', $quanly_nxb);
    }
  
    //đăng xuát
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('login-checkout');
    }
//kiểm tra đăng nhập
    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();
        if($result){
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('trang-chu');
        }else{
            return Redirect::to('login-checkout');
        }
        
    }


    //quản lý khách hàng
    public function manage_customer(){
        
        $manage_customer = DB::table('tbl_customers')->get();
        $manager_customer = view('admin.manage_customer')->with('manage_customer', $manage_customer);
        return view('adminlayout')->with('admin.manage_customer', $manager_customer);
    }

}
