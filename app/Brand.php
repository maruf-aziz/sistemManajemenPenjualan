<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    //
    protected $primaryKey = 'id_brands';

    use SoftDeletes;
    protected $fillable = ['name'];
}
