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

// lưu thông tin gửi hàng của khách hàng sau khi mua hàng
public function save_checkout_customer(Request $request){
    $data = array();
    $data['shipping_name'] = $request->shipping_name;
    $data['shipping_phone'] = $request->shipping_phone;
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_notes'] = $request->shipping_notes;
    $data['shipping_address'] = $request->shipping_address;

    $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

    Session::put('shipping_id', $shipping_id);
    
    return Redirect::to('payment');
}
public function payment(){
    $quanly_nxb = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
    return  view('user.payment')->with('quanly_nxb', $quanly_nxb);

}
public function order_place(Request $request){
    
    $data = array();
    $data['payment_method'] = $request->payment_option;
    $data['payment_status'] = 'Đang chờ xử lý';
    $payment_id = DB::table('tbl_payment')->insertGetId($data);

    //insert order
    $order_data = array();
    $order_data['customer_id'] = Session::get('customer_id');
    $order_data['shipping_id'] = Session::get('shipping_id');
    $order_data['payment_id'] = $payment_id;
    $order_data['order_total'] = Cart::total();
    $order_data['order_status'] = 'Đang chờ xử lý';
    $order_id = DB::table('tbl_order')->insertGetId($order_data);

    //insert order_details
    $content = Cart::content();
    foreach($content as $v_content){
        
        $order_d_data['order_id'] =$order_id;
        $order_d_data['product_id'] = $v_content->id;
        $order_d_data['product_name'] =$v_content->name;
        $order_d_data['product_price'] = $v_content->price;
        $order_d_data['product_sales_quantity'] =$v_content->qty;
        DB::table('tbl_order_details')->insert($order_d_data);
    }
    if($data['payment_method']==1){
        echo 'Thanh toán thẻ ATM';
    }else{
        Cart::destroy();
        $quanly_nxb = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
    //insert hình thức thanh toán
        return view('user.handcash')->with('quanly_nxb', $quanly_nxb);
    }
    

   // return Redirect::to('/payment');
}
//quan ly don hang
public function manage_order(){
    $all_order = DB::table('tbl_order')
    ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
    ->select('tbl_order.*','tbl_customers.customer_name')
    ->orderby('tbl_order.order_id', 'desc')->get();
    $manager_order= view('admin.manage_order')->with('all_order', $all_order);
    return view('adminlayout')->with('admin.manage_order', $manager_order);
}
//hien giao dien quan lý chi tiết đon hang
public function view_order($orderId){
    $order_by_id = DB::table('tbl_order')
    ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
    ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
    
    ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*')
    ->where('tbl_order.order_id', $orderId)->get();
    
    $manager_order_by_id= view('admin.view_order')->with('order_by_id', $order_by_id);
    return view('adminlayout')->with('admin.view_order', $manager_order_by_id);
    
}
//xóa đơn hàng
public function delete_order($order_id){
   
    DB::table('tbl_order')->where('order_id',$order_id)->delete();
    Session::put('message','Xóa sản phẩm thành công');
    return Redirect::to('manage-order');  
}
    //quản lý khách hàng
    public function manage_customer(){
        
        $manage_customer = DB::table('tbl_customers')->get();
        $manager_customer = view('admin.manage_customer')->with('manage_customer', $manage_customer);
        return view('adminlayout')->with('admin.manage_customer', $manager_customer);
    }

}
