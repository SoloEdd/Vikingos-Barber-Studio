<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Barbero - Citas de Hoy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Estilos Generales (para fuentes y base) --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Estilos Específicos del Dashboard --}}
    <link rel="stylesheet" href="{{ asset('css/barber.css') }}">
</head>
<body>

    <div class="dashboard-container">
        
        {{-- Encabezado del Dashboard --}}
        <div class="d-flex justify-content-between align-items-center card-header-custom">
            <div>
                <h1 class="h3 text-warning-custom mb-0">Vikingos Barber Studio</h1>
                <p class="mb-0 text-white-50">Panel de Control de Citas</p>
            </div>
            
            <div class="d-flex gap-3 align-items-center">
                {{-- AQUÍ ESTABA EL ERROR: Cambiamos auth()->user() por $usuario --}}
                <span class="text-white">Hola, <strong>{{ $usuario->nombre }}</strong></span>
                <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Cerrar Sesión</a>
            </div>
        </div>

        {{-- Título y Fecha --}}
        <div class="mb-4">
            <h2 class="h4">Citas para Hoy ({{ date('d-m-Y') }})</h2>
        </div>

        {{-- Tabla de Citas --}}
        @if($citas->isEmpty())
            <div class="alert alert-dark text-center p-5 border-secondary">
                <h4 class="text-warning-custom">No hay citas programadas para hoy.</h4>
                <p class="text-white-50">No tienes servicios pendientes por el momento.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-barber table-hover shadow">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">Hora</th>
                            <th>Cliente</th>
                            <th>Servicio</th>
                            <th>Preferencia</th>
                            <th>Comentarios</th>
                            <th class="text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)
                            <tr>
                                <td class="text-center fw-bold text-warning-custom">
                                    {{ \Carbon\Carbon::parse($cita->hora)->format('H:i') }}
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $cita->usuario->nombre ?? 'Usuario eliminado' }}</div>
                                    <small class="text-white-50">{{ $cita->usuario->email ?? '' }}</small>
                                </td>
                                <td>
                                    {{ ucfirst(str_replace('-', ' ', $cita->servicio)) }}
                                </td>
                                <td>
                                    @if($cita->barbero)
                                        <span class="badge bg-secondary">{{ ucfirst($cita->barbero) }}</span>
                                    @else
                                        <span class="text-muted fst-italic small">Cualquiera</span>
                                    @endif
                                </td>
                                <td>
                                    @if($cita->comentarios)
                                        <small>{{ Str::limit($cita->comentarios, 50) }}</small>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-pending">Pendiente</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>