<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //

    public function login()
    {

        return view("auth.login");
    }

    public function register()
    {

        return view("auth.register");
    }

    public function create(Request $request)
    {
        $usuario = new Usuario();
        $usuario->usu_nombres = $request->nombres;
        $usuario->email = $request->correo;
        $usuario->usu_apellidos = $request->apellidos;
        $usuario->usu_telefono = $request->telefono;


        $usuario->usu_contraseña = Hash::make($request->contrasenia);
        $query = $usuario->save();


        if ($query) {

            $valido = 1;
        } else {
            $valido = 0;
        }


        return response()->json(['valido' => $valido]);
    }


    public function iniciarSesion(Request $request)
    {

        $usuario = Usuario::where('email', '=', $request->correo)->first();


        $valido = 0;

        if ($usuario) {
            if (Hash::check($request->contrasenia, $usuario->usu_contraseña)) {
                $request->session()->put('LoginUsuario', $usuario->email);
                $valido = 1;
            }
        } else {
            $valido = 0;
        }

        return response()->json(['valido' => $valido]);
    }
}
