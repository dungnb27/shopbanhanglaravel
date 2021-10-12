<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'category_id ','category_name','meta_keywords','category_desc','category_status','category_parent','category_order','slug_category_product'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';

    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
