<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    protected $primaryKey = 'id_product';

    use SoftDeletes;
    protected $fillable = ['name_product','pict','price','unit_id','stock','brand_id', 'lot','exp'];
}
