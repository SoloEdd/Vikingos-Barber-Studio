<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->password, $usuario->password)) {
            session(['usuario_id' => $usuario->id]);
            return redirect('/reservar');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }

    public function logout()
    {
        session()->forget('usuario_id');
        return redirect('/');
    }

    public function registerStore(Request $request)
    {
        // 1. Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios', // Debe ser único en la tabla 'usuarios'
            'password' => 'required|string|min:6|confirmed', // 'confirmed' busca el campo password_confirmation
        ]);

        // 2. Creación del usuario en la base de datos
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password), // ¡Importante: Hashear la contraseña!
        ]);

        // 3. Opcional: Iniciar sesión inmediatamente después del registro
        session(['usuario_id' => $usuario->id]);

        // 4. Redirigir al usuario
        return redirect()->route('reservar')->with('success', 'Cuenta creada exitosamente. ¡Bienvenido!');
    }
}

