<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'shipping_id ','shipping_name','shipping_email','shipping_note',
        'shipping_method','shipping_address','shipping_phone'
    ];
    protected $primaryKey = 'shipping_id';
    protected $table = 'tbl_shipping';
}
