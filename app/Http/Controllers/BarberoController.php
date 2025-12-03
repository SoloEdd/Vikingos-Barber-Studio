<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion;
use App\Models\Usuario;
use Carbon\Carbon; // Para manejar fechas

class BarberoController extends Controller
{
    public function index()
    {
        // 1. Obtener el usuario actual basado en la sesión manual
        $usuarioId = session('usuario_id');
        $usuario = Usuario::find($usuarioId);
        $hoy = Carbon::today();

        // Ordenamos: Primero las pendientes, luego por hora
        $citas = Reservacion::whereDate('fecha', $hoy)
                            ->orderByRaw("FIELD(estado, 'pendiente', 'finalizada', 'cancelada')")
                            ->orderBy('hora', 'asc')
                            ->with('usuario')
                            ->get();

        return view('barber.dashboard', compact('citas', 'usuario'));
    }

    public function finalizar($id)
    {
        $cita = Reservacion::findOrFail($id);

        $cita->update(['estado' => 'finalizada']);

        return back()->with('success', 'Cita marcada como finalizada.');
    }
}