<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quanly extends Model
{
    protected $table = 'tbl_category_product';
    public function product()
    {
        return $this->belongsTo(Product::class,'lsp_id', 'lsplsp_id');
    }
}
