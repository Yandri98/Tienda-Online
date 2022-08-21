<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;
use App\Http\Models\Product;
use Validator, Str, Config;

class ProductController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');

    }

    public function getHome(){
        return view('admin.products.home');
    } 

    public function getProductAdd(){
        $cats = Category::where('module','0')->pluck('name','id');
        $data = ['cats' => $cats];
        return view('admin.products.add', $data);
    }

    public function postProductAdd (Request $request){
        $rules = [
            'name'=> 'required',
            'img'=> 'required|image',
            'price'=> 'required',
            'content'=> 'required'    
        ];

        $message = [
            'name.required'=>'El nombre es requerido',
            'img.required'=>'Carga una imagen',
            'img.image'=>'El archivo seleccionado no es una imagen',
            'price.required'=>'Ingrese el precio del producto',
            'content.required'=>'Ingrese una descripción'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()):
             return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $path = '/'.date('Y-m-d'); //fecha en que se subio la imagen o el folder
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystem.disk.uploads.root'); //Se guarda en el servidor 
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
            $filename =  rand(1,999).'-'.$name.'.'.$fileExt;
            return $filename;    

            $product = new Product;
            $product->status = '0';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category');
            $product->image = "image.png";
            $product->price= $request->input('price');
            $product->in_discount= $request->input('indiscount');
            $product->discount= $request->input('discount'); 
            $product->content = e($request->input('content'));
            if($product->save()):
                return redirect('/admin/products')->with('message','Guardado con éxito')->with('typealert','success');
            endif;
        endif;

    }
}
