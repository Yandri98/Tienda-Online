<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $table = 'categories';
    protected $hidden = ['created_at','update_at']; //Ocultar todos los campos dentro del arrglo
}
