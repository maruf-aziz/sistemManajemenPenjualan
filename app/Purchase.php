<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    //
    use SoftDeletes;

    protected $table = 'purchases'; 
    protected $fillable = ['total_cost','supplier_id'];
}
