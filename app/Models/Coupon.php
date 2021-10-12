<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'coupon_id','coupon_name','coupon_code','coupon_time','coupon_number','coupon_condition'
    ];
    protected $primaryKey = 'coupon_id';
    protected $table = 'tbl_coupon';
}
