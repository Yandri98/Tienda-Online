<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;
use App\Http\Models\Product;
use Validator, Str, Config, Image;

class ProductController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');

    }

    public function getHome(){
        $products = Product::with(['cat'])->orderBy('id', 'desc')->paginate(25);//optimizando el tiempo de respuesta de las consultas query con with
        $data =['products'=> $products];    
        return view('admin.products.home', $data);
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
            $upload_path = Config::get('filesystems.disks.uploads.root'); //Se guarda en el servidor 
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
            $filename =  rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$filename;
        
            
            $product = new Product;
            $product->status = '0';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category');
            $product->file_path = date('Y-m-d');
            $product->image = $filename;
            $product->price= $request->input('price');
            $product->in_discount= $request->input('indiscount');
            $product->discount= $request->input('discount'); 
            $product->content = e($request->input('content'));

            if($product->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){ //Otro metodo es resize, para achicar la imagen
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return redirect('/admin/products')->with('message','Guardado con éxito')->with('typealert','success');
            endif;
        endif;  //Si genera el error Disk [uploads] does not have a configured driver. Se debe limpiar y configurar la cache. con "php artisan config:cache".

    }

    //Editar Productos
    public function getProductEdit($id){ 
        $product = Product::findOrFail($id);
        $cats = Category::where('module','0')->pluck('name','id');
        $data = ['cats' => $cats, 'product'=>$product];
         return view('admin.products.edit', $data);
    }

    public function postProductEdit($id, Request $request){
        $rules = [
            'name'=> 'required',
            //'img'=> 'required|image',
            'price'=> 'required',
            'content'=> 'required'    
        ];

        $message = [
            'name.required'=>'El nombre es requerido',
            'img.image'=>'El archivo seleccionado no es una imagen',
            'price.required'=>'Ingrese el precio del producto',
            'content.required'=>'Ingrese una descripción'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()):
             return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
     
            $product = Product::findOrFail($id);
            $product->status = e($request->input('status'));
            $product->name = e($request->input('name'));
            //$product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category');
             if($request->hasFile('img')):
                $path = '/'.date('Y-m-d'); //fecha en que se subio la imagen o el folder
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root'); //Se guarda en el servidor 
                $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
                $filename =  rand(1,999).'-'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;
                $product->file_path = date('Y-m-d');
                $product->image = $filename;
            endif;
            $product->price= $request->input('price');
            $product->in_discount= $request->input('indiscount');
            $product->discount= $request->input('discount'); 
            $product->content = e($request->input('content'));

            if($product->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){ //Otro metodo es resize, para achicar la imagen
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return back()->with('message','Actualizado con éxito')->with('typealert','success');
            endif;
        endif;
    }
}
