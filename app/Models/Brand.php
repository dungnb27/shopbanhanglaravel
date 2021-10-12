<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'brand_id','brand_name','brand_desc','brand_status'
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand';


}
