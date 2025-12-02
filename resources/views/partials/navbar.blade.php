<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #221111; border-bottom: 1px solid #482323;">
        <div class="container-fluid">
            {{-- Enlace del logo usando la ruta raíz (o la ruta que definas para el inicio) --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- Ruta de la imagen usando la función asset() --}}
                <img src="{{ asset('img/vikingoslogo.png') }}" alt="Logo de Vikingos Barber Studio" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    {{-- Los enlaces de anclaje funcionan correctamente si la página principal es la actual (/) --}}
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
                        {{-- Enlace al login usando la función route() --}}
                        <a class="nav-link btn-reservar" href="{{ route('login') }}">Reservar ahora</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>