<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_Transaction extends Model
{
    //
    use SoftDeletes;

    protected $table = 'detail_transactions'; 
    protected $fillable = ['unit_price','disc_item','amount','subTotal','product_id','transaction_id'];
}
