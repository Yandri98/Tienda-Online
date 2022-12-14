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

    public function cat(){
        return $this->hasOne(Category::class, 'id','category_id'); //relación del modelo categoria con producto. relacion de 1 a 1 
    }

    public function getGallery (){ 
        return $this->hasMany(PGallery::class, 'product_id','id');//Relacion de la tabla galeria con la tabla producto de 1 a muchos.
    }
}
