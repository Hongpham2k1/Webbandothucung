<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\ThemNxb;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


session_start();
class CartController extends Controller
{
    //luu gio hang
    public function save_cart(Request $request){
           
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = Product::find($productId);
        $data['id']= $product_info->product_id;
        $data['qty']= $quantity;
        $data['name']= $product_info->product_name;
        if ($product_info->isPromotion()) {
         $data['price'] = $product_info->product_price_km;
        } else {
         $data['price'] = $product_info->product_price;
        }

        $data['weight']= $product_info->product_price;
        $data['options']['image']= $product_info->product_image;
        Cart::add($data);
        Cart::setGlobalTax(0);//xet thue 0%
        return Redirect::to('/show_cart');
       
 }
 //show gio hang
 public function show_cart(){
     $quanly_nxb = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

     return view('user.show_cart')->with('quanly_nxb', $quanly_nxb);
 }
 //xoa gio hang
 public function delete_to_cart($rowId){
     Cart::update($rowId,0);
     return Redirect::to('/show_cart');
 }
 //cap nhat so luong
 public function update_cart_quantity(Request $request){
     $rowId=$request->rowId_cart;
     $qty = $request->cart_quantity;
     Cart::update($rowId,$qty);
     return Redirect::to('/show_cart');
 }
}
