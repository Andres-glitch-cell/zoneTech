<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Inicia Sesión</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #030305;
        }

        h1,
        h2,
        .logo-font {
            font-family: 'Outfit', sans-serif;
        }

        /* --- CONTENEDOR CON LUZ FLUIDA Y SUAVE --- */
        .contenedor-border-pro {
            position: relative;
            padding: 1.5px;
            /* Borde más fino para menos intensidad */
            border-radius: 16px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* El haz de luz: Colores más suaves y mayor difuminado */
        .contenedor-border-pro::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            /* Colores ZoneTech: Rojo suave, Violeta y Cian */
            background: conic-gradient(from 0deg,
                    transparent 0%,
                    #ff3333 15%,
                    #a855f7 30%,
                    #06b6d4 45%,
                    transparent 60%);
            animation: rotate-border 4s linear infinite;
            opacity: 0;
            filter: blur(8px);
            /* Difuminado para que no sea tan intenso */
            transition: opacity 0.5s ease;
        }

        @keyframes rotate-border {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Activación por Focus o Contenido */
        .contenedor-activo {
            box-shadow: 0 0 25px rgba(168, 85, 247, 0.1);
        }

        .contenedor-activo::before {
            opacity: 1;
        }

        /* Estilo del Input */
        .input-pro {
            position: relative;
            z-index: 2;
            width: 100%;
            background: #0d0d10 !important;
            border: none !important;
            border-radius: 15px;
            outline: none !important;
            color: #e2e8f0;
            font-size: 0.875rem;
        }

        /* Botón con Glow suave */
        .btn-pro {
            background: linear-gradient(90deg, #ff3333, #a855f7);
            position: relative;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .btn-pro::after {
            content: '';
            position: absolute;
            inset: 0;
            background: inherit;
            filter: blur(15px);
            opacity: 0;
            z-index: -1;
            transition: opacity 0.4s ease;
        }

        .btn-pro:hover {
            transform: translateY(-2px);
        }

        .btn-pro:hover::after {
            opacity: 0.5;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 selection:bg-red-500/30">

    <div class="w-full max-w-[400px]" x-data="{
        email: '',
        password: '',
        focusEmail: false,
        focusPass: false
    }">

        <div class="text-center mb-10">
            <h1 onclick="inicio()" class="text-5xl font-black text-white tracking-tighter cursor-pointer">
                Z<span class="text-red-500">T</span>
            </h1>
            <p class="text-zinc-600 text-[10px] font-bold uppercase tracking-[0.4em] mt-2">Security Interface v2.0</p>
        </div>

        <div class="bg-[#0d0d0f]/60 backdrop-blur-2xl border border-white/5 rounded-[2.5rem] p-8 shadow-2xl relative">

            <div class="absolute -top-10 -right-10 w-40 h-40 bg-red-500/5 blur-[80px] rounded-full"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-cyan-500/5 blur-[80px] rounded-full"></div>

            <h2 class="text-xl font-bold mb-8 text-zinc-200 text-center tracking-tight">Identificación</h2>

            <form action="#" class="space-y-6">

                <div class="space-y-2">
                    <label class="block text-[9px] font-bold text-zinc-500 uppercase tracking-widest ml-1">Email Corporativo</label>
                    <div class="contenedor-border-pro" :class="(focusEmail || email.length > 0) ? 'contenedor-activo' : ''">
                        <input
                            type="email"
                            x-model="email"
                            @focus="focusEmail = true"
                            @blur="focusEmail = false"
                            placeholder="usuario@zonetech.com"
                            class="input-pro py-3.5 px-5 placeholder-zinc-700 transition-all" />
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest">Código de Acceso</label>
                        <a href="#" class="text-[9px] text-zinc-600 hover:text-zinc-400 transition-colors uppercase">Recuperar</a>
                    </div>
                    <div class="contenedor-border-pro" :class="(focusPass || password.length > 0) ? 'contenedor-activo' : ''">
                        <input
                            type="password"
                            x-model="password"
                            @focus="focusPass = true"
                            @blur="focusPass = false"
                            placeholder="••••••••••••"
                            class="input-pro py-3.5 px-5 placeholder-zinc-700 transition-all" />
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn-pro w-full py-4 rounded-xl text-white text-xs font-black uppercase tracking-[0.2em] shadow-lg active:scale-95">
                        Verificar Identidad
                    </button>
                </div>

            </form>
        </div>

        <div class="mt-8 text-center">
            <button onclick="crearCuenta()" class="text-[10px] font-bold text-zinc-500 hover:text-red-500 transition-all uppercase tracking-widest">
                ¿No tienes cuenta? <span class="text-zinc-300 ml-1 underline underline-offset-4 decoration-red-900">Registrarse</span>
            </button>
        </div>

    </div>

    <script>
        function inicio() {
            window.location.href = "/dashboard";
        }

        function crearCuenta() {
            window.location.href = "/register";
        }
    </script>
</body>

</html>