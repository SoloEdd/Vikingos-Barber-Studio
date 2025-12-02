<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Cita - Vikingos Barber Studio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/style.css" rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="reservation-page">
    <header>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @if (isset($usuario))
                    <li class="nav-item d-flex align-items-center me-3">
                        <span class="nav-link" style="color: #FFD700; padding: 0;">
                            Bienvenido: **{{ $usuario->email }}**
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-reservar" href="{{ route('logout') }}" style="background-color: #c9302c; border-color: #c9302c;">
                            Cerrar Sesión
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn-reservar" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                @endif
            </ul>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <main class="reservation-main">
        <section class="reservation-hero">
            <div class="reservation-container">
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
                                    <label for="nombre">Nombre Completo *</label>
                                    <input type="text" id="nombre" name="nombre" required>
                                    <span class="error-message"></span>
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono *</label>
                                    <input type="tel" id="telefono" name="telefono" required>
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" id="email" name="email">
                                <span class="error-message"></span>
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
                                    <input type="date" id="fecha" name="fecha" required min="">
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
                                <label for="comentarios">Comentarios o Solicitudes Especiales</label>
                                <textarea id="comentarios" name="comentarios" rows="4" placeholder="¿Hay algo específico que quieras que sepamos sobre tu cita?"></textarea>
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="form-terms">
                                <label class="checkbox-container">
                                    <input type="checkbox" id="terminos" name="terminos" required>
                                    <span class="checkmark"></span>
                                    Acepto los <a href="#" target="_blank">términos y condiciones</a> y la <a href="#" target="_blank">política de privacidad</a>
                                </label>
                                <span class="error-message"></span>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-reservar-form">Confirmar Reserva</button>
                            <button type="button" class="btn-cancelar" onclick="window.history.back()">Cancelar</button>
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
        </section>
    </main>

    <footer class="main-footer">
        <p>
            Vikingos Barber Studio +524616132667
            <br>
            Manuel Doblado 226, Col. Centro, 38000
            <br>
            Celaya, Gto.
        </p>
        <p>Vikingos Barber Studio &copy; 2025. Todos los derechos reservados.</p>
    </footer>

    <script src="../js/reservacionvalidacion.js"></script>
    
</body>
</html>