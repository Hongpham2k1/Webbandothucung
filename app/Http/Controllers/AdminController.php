<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    //
     // trang login admin
     public function index(){
        return view('adminlogin');
    }
    //show trang chủ admin
    public function showdashboard(){
        
        return view('adminlayout');
    }

    //test chức năng sai mật khẩu
    public function dashboard(Request $request){
        $email = $request-> email;
        $password = md5($request->password);
        $result = DB::table('tbl_admin')->where('email', $email)->where('password', $password)->first();
        if(isset($result)){
            return view('adminlayout');
        }else{
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai. Làm ơn nhập lại');
            return Redirect::to('/admin');

        }

    }

    //đăng xuất
    public function logout(){
        
        return Redirect::to('/admin');
    }
}
