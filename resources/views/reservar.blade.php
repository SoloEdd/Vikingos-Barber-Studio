<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Cita - Vikingos Barber Studio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Iconos FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- Estilos Propios --}}
    <link href="{{ asset('css/style.css') }}" rel='stylesheet'>
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <style>
        /* Estilos personalizados para las Tabs en modo oscuro */
        .nav-tabs { border-bottom: 1px solid #482323; }
        .nav-tabs .nav-link { color: #aaa; border: 1px solid transparent; }
        .nav-tabs .nav-link:hover { color: #e4c483; border-color: transparent; }
        .nav-tabs .nav-link.active {
            background-color: #221111;
            color: #e4c483;
            border-color: #482323 #482323 #221111;
            font-weight: bold;
        }
        
        /* Estilos para tablas oscuras personalizadas */
        .table-custom { color: #f0f0f0; background-color: #2a1515; }
        .table-custom th { color: #e4c483; background-color: #381a1a; border-color: #482323; }
        .table-custom td { border-color: #482323; vertical-align: middle; }
    </style>
</head>
<body class="reservation-page">
    
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #221111; border-bottom: 1px solid #482323;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('mainsite') }}">
                    <img src="{{ asset('img/vikingoslogo.png') }}" alt="Logo de Vikingos Barber Studio" height="100">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center">
                        @if (isset($usuario))
                            {{-- Enlace para activar la pestaña de Mis Citas --}}
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="activarTab('mis-citas')" style="color: #e4c483; cursor: pointer;">
                                    <i class="fas fa-calendar-check"></i> Mis Citas
                                </a>
                            </li>

                            <li class="nav-item d-flex align-items-center mx-3">
                                <span class="nav-link text-white p-0">
                                    Hola, <strong>{{ $usuario->nombre }}</strong>
                                </span>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link btn-reservar" href="{{ route('logout') }}" style="background-color: #c9302c; border-color: #c9302c; font-size: 0.9em; padding: 5px 15px;">
                                    Salir
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link btn-reservar" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="reservation-main">
        <section class="reservation-hero">
            <div class="reservation-container">
                
                {{-- SECCIÓN DE ALERTAS --}}
                @if(session('error'))
                    <div class="alert alert-danger mb-3 shadow" role="alert" style="background-color: #5d0000; color: #ff9999; border: 1px solid #ff0000;">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success mb-3 shadow" role="alert" style="background-color: #0f5132; color: #d1e7dd; border: 1px solid #badbcc;">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                {{-- NAVEGACIÓN DE PESTAÑAS (TABS) --}}
                <ul class="nav nav-tabs mb-4" id="reservationTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nueva-tab" data-bs-toggle="tab" data-bs-target="#nueva" type="button" role="tab">
                            Nueva Reserva
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="citas-tab" data-bs-toggle="tab" data-bs-target="#citas" type="button" role="tab">
                            Mis Citas / Historial
                        </button>
                    </li>
                </ul>

                {{-- CONTENIDO DE LAS PESTAÑAS --}}
                <div class="tab-content" id="reservationTabsContent">
                    
                    {{-- TAB 1: FORMULARIO DE NUEVA RESERVA --}}
                    <div class="tab-pane fade show active" id="nueva" role="tabpanel">
                        <div class="reservation-header">
                            <h1>Reservar tu Cita</h1>
                            <p>Agenda tu cita en Vikingos Barber Studio y vive una experiencia única</p>
                        </div>
                        <div class="reservation-content">
                            <form class="reservation-form" id="reservationForm" method="POST" action="{{ route('reservar.store') }}">
                                @csrf
                                <div class="form-section">
                                    <h3>Información Personal</h3>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Completo</label>
                                            {{-- Campo de solo lectura con el nombre del usuario logueado --}}
                                            <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre ?? '' }}" readonly style="background-color: #331919; color: #aaa; cursor: not-allowed;">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Teléfono *</label>
                                            <input type="tel" id="telefono" name="telefono" required>
                                            <span class="error-message"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <h3>Detalles de la Cita</h3>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="servicio">Servicio *</label>
                                            <select id="servicio" name="servicio" required>
                                                <option value="">Selecciona un servicio</option>
                                                <option value="corte-pelo">Corte de Pelo - $200</option>
                                                <option value="afeitado-clasico">Afeitado Clásico - $150</option>
                                                <option value="corte-afeitado">Corte + Afeitado - $300</option>
                                                <option value="coloracion">Coloración - $250</option>
                                                <option value="estilismo">Estilismo - $180</option>
                                                <option value="combo-completo">Combo Completo - $400</option>
                                            </select>
                                            <span class="error-message"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="barbero">Barbero de Preferencia</label>
                                            <select id="barbero" name="barbero">
                                                <option value="">Sin preferencia</option>
                                                <option value="ricardo">Ricardo - Especialista en cortes</option>
                                                <option value="javier">Javier - Especialista en afeitados</option>
                                                <option value="carlos">Carlos - Especialista en coloración</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="fecha">Fecha Preferida *</label>
                                            <input type="date" id="fecha" name="fecha" required>
                                            <span class="error-message"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="hora">Hora Preferida *</label>
                                            <select id="hora" name="hora" required>
                                                <option value="">Selecciona una hora</option>
                                                <option value="11:00">11:00 AM</option>
                                                <option value="11:30">11:30 AM</option>
                                                <option value="12:00">12:00 PM</option>
                                                <option value="12:30">12:30 PM</option>
                                                <option value="13:00">1:00 PM</option>
                                                <option value="13:30">1:30 PM</option>
                                                <option value="14:00">2:00 PM</option>
                                                <option value="14:30">2:30 PM</option>
                                                <option value="15:00">3:00 PM</option>
                                                <option value="15:30">3:30 PM</option>
                                                <option value="16:00">4:00 PM</option>
                                                <option value="16:30">4:30 PM</option>
                                                <option value="17:00">5:00 PM</option>
                                                <option value="17:30">5:30 PM</option>
                                                <option value="18:00">6:00 PM</option>
                                                <option value="18:30">6:30 PM</option>
                                                <option value="19:00">7:00 PM</option>
                                                <option value="19:30">7:30 PM</option>
                                            </select>
                                            <span class="error-message"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <h3>Información Adicional</h3>
                                    <div class="form-group">
                                        <label for="comentarios">Comentarios</label>
                                        <textarea id="comentarios" name="comentarios" rows="3" placeholder="¿Alguna solicitud especial?"></textarea>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <div class="form-terms">
                                        <label class="checkbox-container">
                                            <input type="checkbox" id="terminos" name="terminos" required>
                                            <span class="checkmark"></span>
                                            Acepto los <a href="#" target="_blank">términos y condiciones</a>
                                        </label>
                                        <span class="error-message"></span>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn-reservar-form">Confirmar Reserva</button>
                                </div>
                            </form>
                            <div class="reservation-info">
                                <div class="info-card">
                                    <h4>Información Importante</h4>
                                    <ul>
                                        <li>Las citas se confirman por teléfono</li>
                                        <li>Política de cancelación: 24 horas antes</li>
                                        <li>Llegada: 10 minutos antes de tu cita</li>
                                        <li>Formas de pago: Efectivo y tarjeta</li>
                                    </ul>
                                </div>

                                <div class="info-card">
                                    <h4>Horarios de Atención</h4>
                                    <div class="schedule-info">
                                        <p><strong>Lunes a Sábado:</strong> 11:00 AM - 8:00 PM</p>
                                        <p><strong>Domingo:</strong> Cerrado</p>
                                    </div>
                                </div>

                                <div class="info-card contact-info">
                                    <h4>Contacto</h4>
                                    <p><strong>📞</strong> +52 461 613 2667</p>
                                    <p><strong>📍</strong> Manuel Doblado 226<br>Col. Centro, Celaya, Gto.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAB 2: MIS CITAS (PENDIENTES E HISTORIAL) --}}
                    <div class="tab-pane fade" id="citas" role="tabpanel">
                        <div class="reservation-header mt-3">
                            <h2>Gestión de Citas</h2>
                            <p>Revisa tus próximas visitas o consulta tu historial.</p>
                        </div>
                        
                        {{-- SECCIÓN: CITAS PENDIENTES --}}
                        <div class="mb-5 p-4 rounded" style="background-color: #221111; border: 1px solid #482323;">
                            <h4 class="text-warning mb-3"><i class="fas fa-clock"></i> Próximas Citas</h4>
                            
                            @if($citasPendientes->isEmpty())
                                <p class="text-white-50 fst-italic">No tienes citas programadas actualmente.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-custom table-hover">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Servicio</th>
                                                <th>Barbero</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($citasPendientes as $cita)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($cita->hora)->format('H:i A') }}</td>
                                                    <td>{{ ucfirst(str_replace('-', ' ', $cita->servicio)) }}</td>
                                                    <td>{{ ucfirst($cita->barbero ?? 'Cualquiera') }}</td>
                                                    <td>
                                                        {{-- Botón para Cancelar Cita --}}
                                                        <form action="{{ route('reservar.cancel', $cita->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas cancelar esta cita? Esta acción no se puede deshacer.');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                <i class="fas fa-times"></i> Cancelar
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>

                        {{-- SECCIÓN: HISTORIAL --}}
                        <div class="p-4 rounded" style="background-color: #1a0f0f;">
                            <h4 class="text-white-50 mb-3"><i class="fas fa-history"></i> Historial</h4>
                            
                            @if($citasPasadas->isEmpty())
                                <p class="text-white-50 fst-italic">Aún no tienes historial de citas registradas.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped table-sm opacity-75">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Servicio</th>
                                                <th>Barbero</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($citasPasadas as $cita)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($cita->hora)->format('H:i A') }}</td>
                                                    <td>{{ ucfirst(str_replace('-', ' ', $cita->servicio)) }}</td>
                                                    <td>{{ ucfirst($cita->barbero ?? '-') }}</td>
                                                    <td>
                                                        @if($cita->estado === 'finalizada')
                                                            <span class="badge bg-success">Finalizada</span>
                                                        @elseif($cita->estado === 'cancelada')
                                                            <span class="badge bg-danger">Cancelada</span>
                                                        @else
                                                            <span class="badge bg-secondary">No asistió / Expirada</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer class="main-footer">
        <p>
            Vikingos Barber Studio +524616132667 <br>
            Manuel Doblado 226, Col. Centro, 38000, Celaya, Gto.
        </p>
        <p>Vikingos Barber Studio &copy; {{ date('Y') }}. Todos los derechos reservados.</p>
    </footer>

    {{-- SCRIPTS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Script de validación de jQuery (se asume que existe en public/js) --}}
    <script src="{{ asset('js/reservacionvalidacion.js') }}"></script>
    
    {{-- Script para manejar el cambio de Tabs --}}
    <script>
        function activarTab(tabName) {
            event.preventDefault();
            
            let tabButton;
            if (tabName === 'mis-citas') {
                tabButton = document.querySelector('#citas-tab');
            } else {
                tabButton = document.querySelector('#nueva-tab');
            }
            
            if(tabButton) {
                const tab = new bootstrap.Tab(tabButton);
                tab.show();
                document.getElementById('reservationTabs').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Script Inline para validación de Domingos en el input de fecha
        document.getElementById('fecha').min = new Date().toISOString().split('T')[0];
        document.getElementById('fecha').addEventListener('input', function() {
            const selectedDate = new Date(this.value);
            // new Date() puede tener problemas de zona horaria, verifica que coincida con el día seleccionado
            // En JS domingo es 0 (si se usa getDay() sobre objeto Date local)
            // Ajuste simple: sumar horas para compensar UTC si es necesario o usar librería moment.js
            // Para fines prácticos básicos:
            if (selectedDate.getUTCDay() === 0) { // getUTCDay suele ser más seguro para inputs YYYY-MM-DD
                alert('Los domingos estamos cerrados. Por favor selecciona otra fecha.');
                this.value = '';
            }
        });
    </script>
</body>
</html>