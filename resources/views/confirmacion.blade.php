<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/style.css" rel='stylesheet'>
</head>
<body class="reservation-page">
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #221111; border-bottom: 1px solid #482323;">
            <div class="container-fluid">
                <a class="navbar-brand" href="mainsite.html">
                    <img src="../img/vikingoslogo.png" alt="Logo de Vikingos Barber Studio" height="100">
                </a>
            </div>
        </nav>
    </header>

    <main class="reservation-main">
        <section class="reservation-hero">
            <div class="reservation-container">
                <div class="reservation-header">
                    <h1>¡Reserva Confirmada!</h1>
                    <p>Gracias por tu reserva. A continuación, se muestra un resumen de los datos de tu cita.</p>
                </div>

                <div class="confirmation-content">
                    <div class="table-container">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Campo</th>
                                    <th scope="col">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Recupera el objeto de reserva de la sesión (flash data)
                                    $reserva = session('reservaData');

                                    // Si no hay datos, mostramos un mensaje de error
                                    if (!$reserva) {
                                        $displayData = [
                                            "Mensaje de Error" => "No se recibieron datos de la reserva. Por favor, intente de nuevo."
                                        ];
                                    } else {
                                        // Mapeo de campos del objeto Reservacion a etiquetas legibles
                                        $displayData = [
                                            "Nombre Completo" => $reserva->usuario->nombre ?? 'N/A', // Asumiendo que puedes cargar el usuario
                                            "Teléfono" => $reserva->usuario->telefono ?? 'N/A',       // (Si agregas el campo teléfono al modelo Usuario)
                                            "Correo Electrónico" => $reserva->usuario->email ?? 'N/A', 
                                            "Servicio" => $reserva->servicio,
                                            "Barbero de Preferencia" => $reserva->barbero ?: 'Sin preferencia',
                                            "Fecha" => $reserva->fecha,
                                            "Hora" => $reserva->hora,
                                            "Comentarios" => $reserva->comentarios ?: 'Sin comentarios',
                                        ];
                                    }

                                ?>
                                @foreach($displayData as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td> 
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('reservar') }}" class="btn btn-outline-warning mt-4">Volver al inicio</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>