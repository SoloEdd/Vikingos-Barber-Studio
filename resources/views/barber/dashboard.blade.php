@extends('layouts.main') {{-- Si decidiste no usar layouts, copia la estructura HTML base --}}

@section('title', 'Panel de Barbero - Citas de Hoy')

@section('content')
<div class="container mt-5 pt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">📅 Citas para Hoy ({{ date('d-m-Y') }})</h2>
        <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar Sesión</a>
    </div>

    @if($citas->isEmpty())
        <div class="alert alert-info text-center">
            No hay citas programadas para el día de hoy.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-dark table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Barbero Solicitado</th>
                        <th>Contacto</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                        <tr>
                            <td class="fw-bold text-warning">{{ \Carbon\Carbon::parse($cita->hora)->format('H:i A') }}</td>
                            <td>
                                {{-- Asumiendo relación con usuario --}}
                                {{ $cita->usuario->nombre ?? 'Usuario eliminado' }}
                            </td>
                            <td>{{ ucfirst($cita->servicio) }}</td>
                            <td>{{ ucfirst($cita->barbero ?? 'Cualquiera') }}</td>
                            <td>{{ $cita->usuario->email ?? '-' }}</td>
                            <td>
                                <span class="badge bg-success">Pendiente</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    
    <div class="mt-4">
        <a href="{{ route('mainsite') }}" class="btn btn-outline-light">Ir al Sitio Principal</a>
    </div>
</div>
@endsection