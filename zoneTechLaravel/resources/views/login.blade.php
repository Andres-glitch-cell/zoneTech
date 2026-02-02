<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Iniciar Sesión</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Outfit:wght@700;800&display=swap"
        rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        .logo-font {
            font-family: 'Outfit', sans-serif;
        }

        /* From Uiverse.io by 3HugaDa3 */
        .checkbox-wrapper {
            --checkbox-size: 25px;
            --checkbox-color: black;
            --checkbox-shadow: rgba(0, 255, 136, 0.3);
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
            padding: 10px;
        }

        .checkbox-wrapper input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkbox-wrapper .checkmark {
            position: relative;
            width: var(--checkbox-size);
            height: var(--checkbox-size);
            border: #ad4ec5 2px solid;
            border-radius: 8px;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .checkbox-wrapper .checkmark::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #00ffcc);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform: scale(0) rotate(-45deg);
        }

        .checkbox-wrapper input:checked~.checkmark::before {
            opacity: 1;
            transform: scale(1) rotate(0);
        }

        .checkbox-wrapper .checkmark svg {
            width: 0;
            height: 0;
            color: #9c00c4;
            z-index: 1;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            filter: drop-shadow(0 0 2px rgba(0, 0, 0, 0.5));
        }

        .checkbox-wrapper input:checked~.checkmark svg {
            width: 18px;
            height: 18px;
            transform: rotate(360deg);
        }

        .checkbox-wrapper:hover .checkmark {
            border-color: #ad4ec5;
            transform: scale(1.1);
            box-shadow:
                0 0 20px purple,
                0 0 40px purple,
                inset 0 0 10px purple;
        }

        .checkbox-wrapper input:checked~.checkmark {
            animation: pulse 1s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 20px var(--checkbox-shadow);
            }

            50% {
                transform: scale(0.9);
                box-shadow:
                    0 0 30px var(--checkbox-shadow),
                    0 0 50px var(--checkbox-shadow);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 20px var(--checkbox-shadow);
            }
        }

        .checkbox-wrapper .label {
            margin-left: 15px;
            font-family: "Segoe UI", sans-serif;
            color: #ad4ec5;
            font-size: 18px;
            text-shadow: 0 0 10px var(--checkbox-shadow);
            opacity: 0.9;
            transition: all 0.3s;
        }

        .checkbox-wrapper:hover .label {
            opacity: 1;
            transform: translateX(5px);
        }

        /* Glowing dots animation */
        .checkbox-wrapper::after,
        .checkbox-wrapper::before {
            content: "";
            position: absolute;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #ad4ec5;
            opacity: 0;
            transition: all 0.5s;
        }

        .checkbox-wrapper::before {
            left: -10px;
            top: 50%;
        }

        .checkbox-wrapper::after {
            right: -10px;
            top: 50%;
        }

        .checkbox-wrapper:hover::before {
            opacity: 1;
            transform: translateX(-10px);
            box-shadow: 0 0 10px #ad4ec5
        }

        .checkbox-wrapper:hover::after {
            opacity: 1;
            transform: translateX(10px);
            box-shadow: 0 0 10px #ad4ec5
        }

        /* 1. El color del fondo cuando lo marcas */
        .checkbox-wrapper .checkmark::before {
            /* Cambiado de verde a un degradado rojo/violeta */
            background: linear-gradient(45deg, #ff0000, #ad4ec5);
        }

        /* 2. El color del icono (el tick/palomita) */
        .checkbox-wrapper .checkmark svg {
            color: white;
            /* Cambiado de morado oscuro a blanco para que se vea */
            filter: drop-shadow(0 0 2px rgba(0, 0, 0, 0.5));
        }

        /* 3. La sombra que brilla (glow) al pasar el ratón */
        .checkbox-wrapper:hover .checkmark {
            border-color: #9c00c4;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.4),
                inset 0 0 10px rgba(255, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-[#0f0f11] min-h-screen flex items-center justify-center p-4 selection:bg-violet-500/30">

    <div class="w-full max-w-[400px]" x-data="{ email: '', password: '', remember: false }">

        <div class="text-center mb-8">
            <h1 onclick="inicio()" class="text-3xl font-black text-red-600 tracking-tighter uppercase logo-font" style="cursor: pointer;">ZoneTech</h1>
            <p class="text-zinc-500 text-sm mt-2">Bienvenido de nuevo, entusiasta.</p>
        </div>

        <div
            class="bg-zinc-900/60 backdrop-blur-xl border border-zinc-800/50 rounded-2xl p-8 shadow-2xl relative overflow-hidden">

            <div class="absolute -top-24 -right-24 w-48 h-48 bg-violet-600/10 blur-[80px] rounded-full"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-indigo-600/10 blur-[80px] rounded-full"></div>
            <h2 class="text-2xl font-bold mb-8 text-white text-center">Iniciar Sesión</h2>
            <form action="#" class="space-y-6 relative z-10">

                <div>
                    <label class="block text-xs font-medium text-zinc-400 uppercase tracking-widest mb-2 ml-1">Correo
                        Electrónico</label>
                    <div class="relative group">
                        <input type="email" x-model="email" placeholder="micorreo@gmail.com"
                            class="w-full bg-zinc-950/50 border border-zinc-800 rounded-xl py-3 px-4 text-white placeholder-zinc-600 focus:outline-none focus:border-violet-500/50 focus:ring-1 focus:ring-violet-500/20 transition-all duration-300" />
                    </div>
                </div>

                <div>
                    <div class="flex justify-between mb-2 ml-1">
                        <label class="text-xs font-medium text-zinc-400 uppercase tracking-widest">Contraseña</label>
                        <a href="#" class="text-xs text-violet-400 hover:text-violet-300 transition-colors">¿Olvidaste
                            la clave?</a>
                    </div>
                    <div class="relative">
                        <input type="password" x-model="password" placeholder="Mínimo 8 caracteres, signos y números"
                            class="w-full bg-zinc-950/50 border  border-zinc-800 rounded-xl py-3 px-4 text-white placeholder-zinc-600 focus:outline-none focus:border-violet-500/50 focus:ring-1 focus:ring-violet-500/20 transition-all duration-300" />
                    </div>
                </div>

                <div class="flex items-center gap-3 px-1">

                    <!-- From Uiverse.io by 3HugaDa3 -->
                    <label class="checkbox-wrapper">
                        <input type="checkbox" />
                        <div class="checkmark">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M20 6L9 17L4 12" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <span class="label">Recordar Credenciales</span>
                    </label>

                </div>

                <button type="submit"
                    class="w-full py-4 bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 text-white rounded-xl font-semibold shadow-lg shadow-violet-900/20 transition-all duration-300 active:scale-[0.98]">
                    Entrar a ZoneTech
                </button>

            </form>
        </div>

        <p class="text-center mt-8 text-zinc-500 text-sm">
            ¿No tienes cuenta?
            <a href="#" class="text-white font-medium hover:text-violet-400 transition-colors">Crea una ahora</a>
        </p>

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