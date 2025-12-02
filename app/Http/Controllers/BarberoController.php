<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion;
use Carbon\Carbon; // Para manejar fechas

class BarberoController extends Controller
{
    public function index()
    {
        // Verifica seguridad (Opcional si usas middleware en la ruta)
        if (session('usuario_rol') !== 'admin' && session('usuario_rol') !== 'barbero') {
            return redirect('/reservar');
        }

        // Obtener la fecha de hoy
        $hoy = Carbon::today();

        // Buscar reservaciones donde la fecha sea hoy
        // Ordenadas por hora
        $citas = Reservacion::whereDate('fecha', $hoy)
                            ->orderBy('hora', 'asc')
                            ->get();

        return view('barber.dashboard', compact('citas'));
    }
}