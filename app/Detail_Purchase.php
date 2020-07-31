<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Purchase extends Model
{
    //

    protected $table = 'detail_purchases'; 
    protected $fillable = ['product','amount','unit_id','value','unit','price_per_seed','total_price','purchase_id'];
}
