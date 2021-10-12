<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'customer_id','customer_name','customer_email','customer_password','customer_phone','customer_vip','customer_picture','customer_token'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customers';
}
