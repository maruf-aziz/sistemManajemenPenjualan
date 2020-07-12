<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retur_Sale extends Model
{
    //
    use SoftDeletes;

    protected $table = 'retur_sales'; 
    protected $primarykey = 'id_retur';
    protected $fillable = ['sale_id','desc'];
}
