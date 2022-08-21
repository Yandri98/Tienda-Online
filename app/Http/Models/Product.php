<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $table = 'products';
    protected $hidden = ['created_at','update_at']; //Ocultar todos los campos dentro del arrglo
}
