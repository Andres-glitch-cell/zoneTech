<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – @yield('titulo', 'Inicio')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /* Cambio de fuente principal a Inter */
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #0f0f11;
            color: #e0e0e0;
            min-height: 100vh;
            line-height: 1.6;
            margin: 0;
            overflow-x: hidden;
        }

        /* --- Cabecera --- */
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
            /* Fuente Outfit para el logo */
            font-family: 'Outfit', sans-serif;
            font-size: 1.9rem;
            font-weight: 900;
            color: #ff0000;
            letter-spacing: -1.5px;
            /* Más compacto para estilo tech */
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
            white-space: nowrap;
            transition: color .2s;
            letter-spacing: -0.2px;
        }

        .navegacion-principal a:hover {
            color: #ff2a2a;
        }

        /* ... (Resto de estilos iguales) ... */
        .acciones-cabecera {
            display: flex;
            align-items: center;
            gap: 24px;
        }

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

        .boton-menu-movil {
            display: none;
            background: none;
            border: none;
            color: #e0e0e0;
            font-size: 1.8rem;
            cursor: pointer;
            width: 44px;
            height: 44px;
            place-items: center;
        }

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
            background: rgba(255, 255, 255, 0.9);
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 25px;
            max-width: 360px;
            width: 90vw;
            transform: perspective(600px) rotateX(12deg) rotateY(-15deg);
            transition: transform 0.4s ease;
        }

        .input__container:hover {
            transform: perspective(600px) rotateX(0) rotateY(0) scale(1.05);
        }

        .shadow__input {
            position: absolute;
            inset: -5px;
            z-index: -1;
            filter: blur(35px);
            border-radius: 30px;
            background: linear-gradient(120deg, #7f7cff, #6effc9, #ff9dff);
            animation: glow 5s linear infinite;
        }

        @keyframes glow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .input__button__shadow {
            cursor: pointer;
            border: none;
            background: none;
            border-radius: 50%;
            padding: 6px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .input__search {
            flex: 1;
            border-radius: 20px;
            outline: none;
            border: none;
            padding: 10px 14px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            background: transparent;
            color: #17202A;
        }

        .superposicion-menu-movil {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            display: none;
            justify-content: flex-end;
        }

        .superposicion-menu-movil.activo {
            display: flex;
        }

        .panel-menu-movil {
            background: #161618;
            width: 80%;
            max-width: 300px;
            height: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .boton-cerrar-menu {
            align-self: flex-end;
            background: none;
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
        }

        .navegacion-movil {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .navegacion-movil a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 10px;
            font-family: 'Outfit', sans-serif;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        main {
            padding-top: 120px;
            max-width: 1100px;
            margin: 0 auto;
            padding-inline: 16px;
            text-align: center;
        }

        h1 {
            /* Fuente Outfit para títulos */
            font-family: 'Outfit', sans-serif;
            margin-bottom: 1.5rem;
            font-weight: 800;
            letter-spacing: -1.5px;
            font-size: clamp(2.2rem, 6vw, 3.4rem);
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
            <div class="logo">ZoneTech</div>
            <nav class="navegacion-principal">
                <a href="#">Ofertas</a>
                <a href="#">Móviles</a>
                <a href="#">TV y Sonido</a>
                <a href="#">Informática</a>
                <a href="#">Electrodomésticos</a>
            </nav>
            <div class="acciones-cabecera">
                <button class="boton-accion" id="btnBuscar" aria-label="Buscar">
                    <svg class="icono-svg" viewBox="0 0 24 24">
                        <path d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <button class="boton-accion" title="Lista de deseos">
                    <svg class="icono-svg" viewBox="0 0 24 24">
                        <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>
                <button class="boton-accion" title="Mi cuenta">
                    <svg class="icono-svg" viewBox="0 0 24 24">
                        <path d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
                <button class="boton-menu-movil" id="botonMenuMovil" aria-label="Menú">☰</button>
            </div>
        </div>
    </header>

    <div class="overlay-blur" id="overlayBlur"></div>

    <div class="buscador-animado" id="buscadorAnimado">
        <div class="input__container">
            <div class="shadow__input"></div>
            <button class="input__button__shadow" id="btnBuscarAnimado">
                <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="20" width="20">
                    <path d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.6l3 3a1 1 0 001.414-1.414l-3-3A7 7 0 009 2z" fill="#17202A" />
                </svg>
            </button>
            <input type="text" class="input__search" placeholder="Buscar productos..." />
        </div>
    </div>

    <main>
        @yield('contenido')
    </main>

    <section>

    </section>

    <script>
        const cabecera = document.getElementById("cabeceraPrincipal");
        const btnBuscar = document.getElementById("btnBuscar");
        const buscador = document.getElementById("buscadorAnimado");
        const overlay = document.getElementById("overlayBlur");
        const btnAnimado = document.getElementById("btnBuscarAnimado");
        const botonMenu = document.getElementById("botonMenuMovil");
        const menuMovil = document.getElementById("menuMovil");
        const botonCerrar = document.getElementById("botonCerrar");

        let ultimaPosicionScroll = 0;
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

        function abrirBuscador() {
            buscador.classList.add("activo");
            overlay.classList.add("activo");
            document.body.style.overflow = "hidden";
        }

        function cerrarBuscador() {
            buscador.classList.remove("activo");
            overlay.classList.remove("activo");
            document.body.style.overflow = "";
        }

        btnBuscar.addEventListener("click", abrirBuscador);
        overlay.addEventListener("click", cerrarBuscador);

        botonMenu.addEventListener("click", () => {
            menuMovil.classList.add("activo");
            document.body.style.overflow = "hidden";
        });

        function cerrarMenu() {
            menuMovil.classList.remove("activo");
            document.body.style.overflow = "";
        }

        botonCerrar.addEventListener("click", cerrarMenu);

        window.addEventListener("keydown", e => {
            if (e.key === "Escape") {
                cerrarBuscador();
                cerrarMenu();
            }
        });

        btnAnimado.addEventListener("click", () => {
            btnAnimado.classList.add("loading");
            setTimeout(() => btnAnimado.classList.remove("loading"), 1000);
        });
    </script>
    @stack('scripts')
</body>

</html>
