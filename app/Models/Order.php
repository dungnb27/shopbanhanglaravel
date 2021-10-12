<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'order_id','customer_id','shipping_id',
        'order_status','order_code','order_day'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';

   
}
