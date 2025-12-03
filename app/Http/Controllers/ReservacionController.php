<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion;
use App\Models\Usuario;
use Carbon\Carbon;

class ReservacionController extends Controller
{
    
    public function create()
    {
        $usuarioId = session('usuario_id');
        $usuario = Usuario::find($usuarioId);
        
        if (!$usuario) {
            return redirect()->route('login');
        }

        $now = Carbon::now(); // Recuerda tener configurada tu zona horaria

        // 1. Citas Pendientes (Activas)
        // Condición: Estado es 'pendiente' Y (Fecha futura O (Hoy y hora futura))
        $citasPendientes = Reservacion::where('usuario_id', $usuarioId)
            ->where('estado', 'pendiente') // <-- Usamos el nuevo campo
            ->where(function ($query) use ($now) {
                $query->where('fecha', '>', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('fecha', '=', $now->toDateString())
                            ->where('hora', '>', $now->toTimeString());
                    });
            })
            ->orderBy('fecha', 'asc')
            ->orderBy('hora', 'asc')
            ->get();

        // 2. Historial (Pasadas o Finalizadas o Canceladas)
        // Condición: Estado NO es pendiente, O la fecha/hora ya pasó
        $citasPasadas = Reservacion::where('usuario_id', $usuarioId)
            ->where(function ($query) use ($now) {
                $query->where('estado', '!=', 'pendiente') // Incluye finalizadas y canceladas
                    ->orWhere('fecha', '<', $now->toDateString())
                    ->orWhere(function ($q) use ($now) {
                        $q->where('fecha', '=', $now->toDateString())
                            ->where('hora', '<=', $now->toTimeString());
                    });
            })
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->get();

        return view('reservar', compact('usuario', 'citasPendientes', 'citasPasadas'));
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
        // Buscamos si existe alguna reserva con la misma fecha y hora o barbero
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

    // NUEVO MÉTODO PARA CANCELAR
    public function destroy($id)
    {
        // Buscar la cita y asegurar que pertenezca al usuario logueado (Seguridad)
        $cita = Reservacion::where('id', $id)
                           ->where('usuario_id', session('usuario_id'))
                           ->first();

        if ($cita) {
            $cita->delete();
            return back()->with('success', 'Cita cancelada correctamente.');
        }

        return back()->with('error', 'No se pudo cancelar la cita.');
    }
}
