<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – @yield('titulo', 'Inicio')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap"
        rel="stylesheet">

    <style>
        /* --- 1. RESET Y BASE --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #0f0f11;
            color: #e0e0e0;
            min-height: 100vh;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* --- 2. CABECERA (LAYOUT) --- */
        .cabecera-sitio {
            position: fixed;
            inset: 0 0 auto;
            z-index: 1000;
            background: rgba(15, 15, 17, .94);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, .07);
            transition: transform .32s cubic-bezier(.22, 1, .36, 1);
        }

        .cabecera-sitio.oculta {
            transform: translateY(-100%);
        }

        .contenedor-cabecera {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 16px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-family: 'Outfit', sans-serif;
            font-size: 1.9rem;
            font-weight: 900;
            color: #ff0000;
            letter-spacing: -1.5px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .navegacion-principal {
            display: flex;
            gap: 24px;
        }

        .navegacion-principal a {
            color: #e0e0e0;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            transition: color .2s;
        }

        .navegacion-principal a:hover {
            color: #ff2a2a;
        }

        .acciones-cabecera {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        /* --- 3. BOTONES DE ACCIÓN --- */
        .boton-accion {
            background: none;
            border: none;
            color: #e0e0e0;
            cursor: pointer;
            transition: all .18s;
            width: 28px;
            height: 28px;
            display: grid;
            place-items: center;
        }

        .boton-accion:hover {
            color: #ff2a2a;
            transform: scale(1.12);
        }

        .icono-svg {
            width: 100%;
            height: 100%;
            stroke: currentColor;
            stroke-width: 1.8;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* --- 4. DESPLEGABLE DE PERFIL (MOUSEOVER) --- */
        .perfil-desplegable-container {
            position: relative;
            display: inline-block;
        }

        .menu-items {
            position: absolute;
            top: 100%;
            right: 0;
            width: 220px;
            background: #16161a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 2px solid #ff0000;
            /* Detalle ZoneTech */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            border-radius: 4px;
            padding: 8px 0;
            margin-top: 12px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.25s cubic-bezier(0.23, 1, 0.32, 1);
            z-index: 1100;
        }

        /* Activar al pasar ratón */
        .perfil-desplegable-container:hover .menu-items {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Puente invisible para no perder el foco */
        .perfil-desplegable-container::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 15px;
        }

        .item-link {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px 16px;
            color: #e0e0e0;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .item-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #ff2a2a;
            padding-left: 20px;
        }

        .item-icon-svg {
            width: 16px;
            height: 16px;
            margin-right: 12px;
            flex-shrink: 0;
            stroke: currentColor;
        }

        .logout-red:hover {
            background: #dc2626 !important;
            color: white !important;
        }

        .menu-divisor {
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin: 5px 0;
        }

        /* --- 5. BUSCADOR ANIMADO --- */
        .overlay-blur {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(10px);
            z-index: 998;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease;
        }

        .overlay-blur.activo {
            opacity: 1;
            pointer-events: auto;
        }

        .buscador-animado {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            opacity: 0;
            pointer-events: none;
            z-index: 999;
            transition: all 0.4s ease;
        }

        .buscador-animado.activo {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            pointer-events: auto;
        }

        .input__container {
            position: relative;
            background: white;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 25px;
            width: 360px;
        }

        .input__search {
            flex: 1;
            border: none;
            outline: none;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: #17202A;
        }

        /* --- 6. MAIN --- */
        main {
            padding-top: 120px;
            max-width: 1440px;
            margin: 0 auto;
            padding-inline: 16px;
            padding-bottom: 60px;
        }

        @media (max-width: 1023px) {
            .navegacion-principal {
                display: none;
            }

            .boton-menu-movil {
                display: grid;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <header class="cabecera-sitio" id="cabeceraPrincipal">
        <div class="contenedor-cabecera">
            <div class="logo" onclick="inicio()">ZoneTech</div>

            <nav class="navegacion-principal">
                <a onclick="productos()">Productos</a>
                <a onclick="soporte()">Soporte Técnico</a>
                <a onclick="nosotros()">Sobre nosotros</a>
                <a onclick="contacto()">Contacto</a>
            </nav>

            <div class="acciones-cabecera">
                <button class="boton-accion" id="btnBuscar" aria-label="Buscar">
                    <svg class="icono-svg" viewBox="0 0 24 24">
                        <path d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>

                <button class="boton-accion" title="Lista de deseos">
                    <svg class="icono-svg" viewBox="0 0 24 24">
                        <path
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>

                <div class="perfil-desplegable-container">
                    <button class="boton-accion" title="Mi cuenta">
                        <svg class="icono-svg" viewBox="0 0 24 24">
                            <path
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>

                    <div class="menu-items">
                        @auth
                            <a href="{{ url('perfil') }}" class="item-link">
                                <svg class="item-icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                                Mi Expediente
                            </a>
                            <a href="{{ url('configuracion') }}" class="item-link">
                                <svg class="item-icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1V11a2 2 0 0 1-2-2 2 2 0 0 1 2-2v-.09A1.65 1.65 0 0 0 3 4.6l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H5a2 2 0 0 1 2 2 2 2 0 0 1-2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33-1.82V15z">
                                    </path>
                                </svg>
                                Configuración
                            </a>
                            <hr class="menu-divisor">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="item-link logout-red">
                                    <svg class="item-icon-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                    </svg>
                                    Cerrar Sistema
                                </button>
                            </form>
                        @else
                            <a href="{{ url('/Usuario/advertenciaUsuarioSinLogin') }}" class="item-link">Iniciar Sesión</a>
                            <a href="{{ url('register') }}" class="item-link">Registrarse</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="overlay-blur" id="overlayBlur"></div>

    <main>
        @yield('principal')
    </main>


    <script>
        const cabecera = document.getElementById("cabeceraPrincipal");
        let ultimaPosicionScroll = 0;

        // Control de scroll para ocultar/mostrar cabecera
        window.addEventListener("scroll", () => {
            const pos = window.scrollY;
            if (pos < 100) {
                cabecera.classList.remove("oculta");
            } else {
                if (pos > ultimaPosicionScroll) cabecera.classList.add("oculta");
                else cabecera.classList.remove("oculta");
            }
            ultimaPosicionScroll = pos;
        }, {
            passive: true
        });

        // Funciones de Navegación (Asegúrate de que estas rutas existen en web.php)
        function inicio() {
            window.location.href = "{{ route('inicio') }}";
        }

        function productos() {
            window.location.href = "{{ route('productos') }}";
        }

        function soporte() {
            window.location.href = "{{ route('soporte') }}";
        }

        function nosotros() {
            window.location.href = "{{ route('nosotros') }}";
        }

        function contacto() {
            window.location.href = "{{ route('contacto') }}";
        }

        // Función específica para los portátiles
        function portatiles() {
            console.log("Navegando a portatiles...");
            window.location.href = "{{ route('portatiles') }}";
        }
    </script>
</body>

</html>
