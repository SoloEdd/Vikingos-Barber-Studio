<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion;
use App\Models\Usuario;

class ReservacionController extends Controller
{
    /**
     * Muestra el formulario de reserva con los datos del usuario logueado.
     */
    public function create()
    {
        $usuarioId = session('usuario_id');
        
        // Buscar el usuario por ID en la base de datos
        $usuario = Usuario::find($usuarioId);

        // Si por alguna razón el usuario no se encuentra, redirigir al login
        if (!$usuario) {
            return redirect()->route('login')->with('error', 'Sesión expirada o usuario no encontrado.');
        }

        // Pasar el objeto $usuario a la vista
        return view('reservar', ['usuario' => $usuario]);
    }

    public function store(Request $request)
    {
        // lógica existente para guardar la reserva
        $request->validate([
            'servicio' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required',
            'barbero' => 'nullable|string',     
            'comentarios' => 'nullable|string', 
        ]);

        // Crear la reservación
        $reservacion = Reservacion::create([
            'usuario_id' => session('usuario_id'),
            'servicio' => $request->servicio,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'barbero' => $request->barbero,         // <-- AÑADIDO
            'comentarios' => $request->comentarios, // <-- AÑADIDO
        ]);
        
        // Usar 'with()' para guardar los datos de la RESERVACIÓN COMPLETA 
        // en la sesión por una única solicitud (flash data).
        return redirect()->route('confirmacion')->with('reservaData', $reservacion);
    }
}
