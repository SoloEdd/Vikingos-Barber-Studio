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

        // 2. Lógica existente de citas
        $hoy = Carbon::today();
        $citas = Reservacion::whereDate('fecha', $hoy)
                            ->orderBy('hora', 'asc')
                            ->with('usuario') // Carga optimizada (Eager loading)
                            ->get();

        // 3. Pasar tanto $citas como $usuario a la vista
        return view('barber.dashboard', compact('citas', 'usuario'));
    }
}