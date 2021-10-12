<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timetamps = false; //Set time to false
    protected $fillable = [
        'id_roles','name'
    ];
    protected $primaryKey = 'id_roles';
    protected $table = 'tbl_roles';

    public function admin(){
        return $this->belongsToMany('App\Models\Admin');
    }

}
