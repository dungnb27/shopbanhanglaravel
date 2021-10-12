<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'slider_id','slider_name','slider_desc','slider_status','slider_image'
    ];
    protected $primaryKey = 'slider_id';
    protected $table = 'tbl_slider';
}
