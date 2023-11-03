<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name', 'category_id', 'product_desc','product_trademark','product_price','product_image','product_price_km','khuyen_mai'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';
    public function isPromotion()
     {
         return $this->khuyen_mai == 1;
     }
}
