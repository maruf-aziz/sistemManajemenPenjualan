<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retur_Purchase extends Model
{
    //
    use SoftDeletes;

    protected $table = 'retur_purchases'; 
    protected $primarykey = 'id_retur';
    protected $fillable = ['purchase_id','desc'];
}
