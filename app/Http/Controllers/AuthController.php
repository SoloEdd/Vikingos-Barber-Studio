<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $usuario = $request->input('usuario');
        $password = $request->input('password');

        if ($usuario === 'admin' && $password === '1234') {
            return redirect('/')->with('success', 'Bienvenido');
        } else {
            return back()->with('error', 'Usuario o contraseña incorrectos');
        }
    }
}
