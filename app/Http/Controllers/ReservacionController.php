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

    // App/Http/Controllers/ReservacionController.php

    public function store(Request $request)
    {
        // 1. Validar formato de datos 
        $request->validate([
            'servicio' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required',
            'barbero' => 'nullable|string',
            'comentarios' => 'nullable|string',
        ]);

        // 2. LÓGICA DE VERIFICACIÓN DE DISPONIBILIDAD
        // Buscamos si existe alguna reserva con la misma fecha y hora
        $existeCita = Reservacion::where('fecha', $request->fecha)
                                ->where('hora', $request->hora)
                                ->where('barbero', $request->barbero)
                                ->exists(); // Retorna true o false

        if ($existeCita) {
            // Si existe, regresamos al formulario con un error y mantenemos los datos escritos (withInput)
            return back()
                ->withInput() 
                ->with('error', 'Lo sentimos, el horario de las ' . $request->hora . 'o el barbero ' . ucfirst($request->barbero) . ' ya está ocupado. Por favor selecciona otra hora.');
        }

        // 3. Crear la reservación (Si pasó la validación anterior)
        $reservacion = Reservacion::create([
            'usuario_id' => session('usuario_id'),
            'servicio' => $request->servicio,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'barbero' => $request->barbero,
            'comentarios' => $request->comentarios,
        ]);

        return redirect()->route('confirmacion')->with('reservaData', $reservacion);
    }
}
