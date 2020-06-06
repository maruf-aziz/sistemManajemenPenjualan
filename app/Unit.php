<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    //

    protected $primaryKey = 'id_unit';

    use SoftDeletes;
    protected $fillable = ['unit'];
}
