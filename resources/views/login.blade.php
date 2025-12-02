<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Vikingos Barber Studio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/loginstyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="login-page">
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #221111; border-bottom: 1px solid #482323;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('mainsite') }}">
                    <img src="../img/vikingoslogo.png" alt="Logo de Vikingos Barber Studio" height="100">
                </a>
            </div>
        </nav>
    </header>

    <main class="login-main">
        <section class="login-hero">
            <div class="login-container">
                
                <div class="login-card">
                    <h2>Iniciar Sesión</h2>

                    @if(session('error'))
                        <div class="alert alert-danger error-message" style="display: block; margin-bottom: 20px; color: #ff9999; background-color: #5d0000; border: 1px solid #ff0000; padding: 10px; border-radius: 5px;">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div id="login-message" class="login-message"></div>
                    <form method="POST" id="loginForm" action="{{ route('login.submit') }}" >
                        @csrf 
                        <div class="form-group">
                            <label for="username">Correo electrónico</label>
                            <input type="email" id="username" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-reservar-form">Iniciar Sesión</button>
                        </div>
                        <div class="login-links">
                            <a href="#">¿Olvidaste tu contraseña?</a>
                            <span>|</span>
                            <a href="{{ route('register') }}">Crear una cuenta</a>
                        </div>
                    </form>
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