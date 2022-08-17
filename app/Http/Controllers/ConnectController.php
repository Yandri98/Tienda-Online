<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator; //importamos el componente para validar 
use App\User; //importamos el modelo User
use Illuminate\Support\Facades\Hash;

class ConnectController extends Controller
{
    public function getLogin(){        //Mostrar vista login
        return view('connect.login');
    }

    public function getRegister(){      //Mostrar vista registro
        return view('connect.register');
    }

    public function postRegister(Request $request){       //enviar formulario registro
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'
        ];

        $message = [
            'name.required'=> 'El campo nombre es requerido.',
            'lastname.required'=>'El campo apellido es requerido.',
            'email.required'=>'El campo email es requerido.',
            'email.email'=> 'Ingrese un correo valido.', 
            'email.unique'=>'Ya existe un usuario registrado con este correo electrónico.',
            'password.required'=>'El campo contraseña es requerido.',
            'password.min' => 'Ingrese un minimo de 8 caracteres.',
            'cpassword.required'=>'Confirme la contraseña',
            'cpassword.same'=>'Las contraseñas no coinciden.'


        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user = new User;
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->password = hash::make($request->input('password')); 

            if($user->save()):
                return redirect('/login')->with('message','Se ha registrado correctamente, ahora puede iniciar sesión')->with('typealert','success');
        endif;
            endif;

    }

}
    

