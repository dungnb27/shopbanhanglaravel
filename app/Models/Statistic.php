<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'id_statistical','order_date','sales','profit','quantity','total_order'
    ];
    protected $primaryKey = 'id_statistical';
    protected $table = 'tbl_statistical';


}
