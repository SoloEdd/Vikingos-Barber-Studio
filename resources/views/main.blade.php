<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vikingos Barber Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #221111; border-bottom: 1px solid #482323;">
            <div class="container-fluid">
                <a class="navbar-brand" href="mainsite.html">
                    <img src="../img/vikingoslogo.png" alt="Logo de Vikingos Barber Studio" height="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#horario">Horario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#galeria">Galería</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#equipo">Equipo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-reservar" href="/login">Reservar ahora</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <main>
        <div class="hero-section" id="reservar">
            <div class="hero-content">
                <h1>Vikingos Barber Studio</h1>
                <p>Donde la tradición se encuentra con el estilo moderno. Experimenta cortes y afeitados de primera clase en un ambiente único.</p>
                <a href="/login" class="btn-reservar">Reservar Ahora</a>
            </div>
        </div>

        <section id= "servicios" class="services-section container">
            <h2>Nuestros Servicios</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 text-center">
                    <div class="col">
                        <div class="service-item">
                            <dt><h3>Cortes de Pelo</h3></dt>
                            <dd><p>Cortes de pelo modernos y clásicos adaptados a tu estilo.</p></dd>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-item">
                            <dt><h3>Afeitados Clásicos</h3></dt>
                            <dd><p>Afeitados tradicionales con una experiencia relajante.</p></dd>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-item">
                            <dt><h3>Coloración</h3></dt>
                            <dd><p>Servicios de coloración para un nuevo look.</p></dd>
                        </div>
                    </div>
                    <div class="col">   
                        <div class="service-item">
                            <dt><h3>Estilismo</h3></dt>
                            <dd><p>Estilismos profesionales para cualquier ocasión.</p></dd>
                        </div>
                    </div>
                </div>
        </section>

        <section id="horario" class="hours-section">
            <h2>Horarios de Atención</h2>
            <table class="schedule-table">
                <tbody>
                    <tr>
                        <th>lunes</th>
                        <td>11 a.m. - 8 p.m.</td>
                    </tr>
                    <tr>
                        <th>martes</th>
                        <td>11 a.m. - 8 p.m.</td>
                    </tr>
                    <tr>
                        <th>miércoles</th>
                        <td>11 a.m. - 8 p.m.</td>
                    </tr>
                    <tr>
                        <th>jueves</th>
                        <td>11 a.m. - 8 p.m.</td>
                    </tr>
                    <tr>
                        <th>viernes</th>
                        <td>11 a.m. - 8 p.m.</td>
                    </tr>
                    <tr>
                        <th>sábado</th>
                        <td>11 a.m. - 8 p.m.</td>
                    </tr>
                    <tr>
                        <th>domingo</th>
                        <td>Cerrado</td>
                    </tr>
                </tbody>
            </table>
        </section>

       <section id="galeria" class="gallery-section container">
            <h2>Galería</h2>
            <div class="row row-cols-2 row-cols-md-3 g-3 text-center">
                <div class="col">
                    <img src="../img/haircut1.jpg" alt="Wolft cut hombre" class="gallery-img img-fluid rounded">
                </div>
                <div class="col">
                    <img src="../img/haircut2.jpg" alt="French crop largo " class="gallery-img img-fluid rounded">
                </div>
                <div class="col">
                    <img src="../img/haircut3.jpg" alt="Medium fade texturizado" class="gallery-img img-fluid rounded">
                </div>
            </div>
        </section>


        <section id="equipo" class="team-section">
            <h2>Nuestro Equipo</h2>
            <div class="team-container">
                <div class="team-member">
                    <img src="../img/ricardo.jpg" alt="Ricardo, especialista en cortes" width="200" height="200"> 
                    <h3>Ricardo</h3>                                                                 
                    <p>Especialista en cortes</p>                                                          
                </div>
                <div class="team-member">
                    <img src="../img/javier.jpg" alt="Javier, especialista en afeitados" width="200" height="200">
                    <h3>Javier</h3>
                    <p>Especialista en afeitados</p>
                </div>
                <div class="team-member">
                    <img src="../img/carlos.jpg" alt="Carlos, especialista en coloración" width="200" height="200">
                    <h3>Carlos</h3>
                    <p>Especialista en coloración</p>
                </div>
            </div>
        </section>

        <section id="contacto"  class="contact-section">
            <h2>Contacto</h2>
            <form class="contact-form" id="contactForm">
                <label for="nombre">Nombre</label>
                <br>
                <input type="text" id="nombre" name="nombre">
                <span class="error-message"></span>
                <br><br>

                <label for="correo">Correo Electrónico</label>
                <br>
                <input type="email" id="correo" name="correo">
                <span class="error-message"></span>
                <br><br>

                <label for="mensaje">Mensaje</label>
                <br>
                <textarea id="mensaje" name="mensaje" rows="4"></textarea>
                <span class="error-message"></span>
                <br><br>

                <button type="submit">Enviar</button>
            </form>
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
        <div class="footer-links">
            <a href="#">Política de Privacidad</a>
            <a href="#">Términos de Servicio</a>
        </div>
    </footer>

<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();
            
            // Limpiar mensajes de error anteriores
            $('.error-message').text('');
            
            let isValid = true;

            // Validación del campo Nombre
            if ($('#nombre').val().trim() === '') {
                $('#nombre').next('.error-message').text('El nombre es obligatorio.');
                isValid = false;
            }

            // Validación del campo Correo Electrónico
            const email = $('#correo').val().trim();
            if (email === '') {
                $('#correo').next('.error-message').text('El correo electrónico es obligatorio.');
                isValid = false;
            } else if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)) {
                $('#correo').next('.error-message').text('Por favor, ingresa un correo electrónico válido.');
                isValid = false;
            }

            // Validación del campo Mensaje
            if ($('#mensaje').val().trim() === '') {
                $('#mensaje').next('.error-message').text('El mensaje es obligatorio.');
                isValid = false;
            }

            if (isValid) {
                // Si la validación es exitosa, muestra la alerta de confirmación
                alert('¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.');
                
                // Opcionalmente, puedes vaciar los campos del formulario
                this.reset();
            }
        });
    });
</script>
</body>
</html>