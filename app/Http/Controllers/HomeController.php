<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
session_start();
class HomeController extends Controller
{
   
    public function index(){
        $quanly_nxb = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $km_product = DB::table('tbl_product')->where('khuyen_mai','1')->orderBy('product_id','desc')->limit(4)->get();
        $all_product = DB::table('tbl_product')->where('khuyen_mai','0')->orderBy('product_id','desc')->limit(6)->get();
        return view('userslayout')->with('quanly_nxb', $quanly_nxb)->with('km_product', $km_product)->with('all_product', $all_product);
    }

    //lienhe
    public function contact(){
        return view('user.contact');
    }
    //tim kiem
    public function search(Request $request){
        $keywords= $request->keywords_submit;
        $quanly_nxb = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $km_product = Product::where('khuyen_mai', 1)
        ->where('product_name', 'like', '%' . $keywords . '%')
        ->get();
        $search_product = Product::where('khuyen_mai', 0)
        ->where('product_name', 'like', '%' . $keywords . '%')->get();
        return view('user.search')->with('quanly_nxb', $quanly_nxb)->with('search_product', $search_product)->with('km_product', $km_product);
    }
}
