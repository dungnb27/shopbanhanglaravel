<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'id_visitors ','ip_address','date_visitor'
    ];
    protected $primaryKey = 'id_visitors';
    protected $table = 'tbl_visitors';
}
