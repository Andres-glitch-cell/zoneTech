<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Restaurar Credenciales</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ==========================================
           1. CONFIGURACIÓN BASE
           ========================================== */
        [x-cloak] { display: none !important; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #000000; /* Negro ZoneTech */
            color: #ffffff;
        }

        .logo-font { font-family: 'Outfit', sans-serif; }

        /* ==========================================
           2. FORMULARIOS E INPUTS
           ========================================== */
        .input-box {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
        }

        .input-box:focus-within {
            border-color: #dc2626; /* Rojo Industrial */
            background: #111111;
            box-shadow: 0 0 15px rgba(220, 38, 38, 0.1);
        }

        .input-field {
            background: transparent;
            width: 100%;
            padding: 14px 16px;
            outline: none;
            font-size: 0.9rem;
            color: #ffffff;
        }

        .input-field::placeholder { color: #333333; }

        .label-text {
            font-size: 10px;
            font-weight: 800;
            color: #444444;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 6px;
            display: block;
        }

        /* ==========================================
           3. BOTONES Y ACCIONES
           ========================================== */
        .btn-submit {
            background: #ffffff;
            color: #000000;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .btn-submit:hover {
            background: #dc2626;
            color: #ffffff;
            transform: translateY(-1px);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-[420px]">

        <div class="mb-10 text-left">
            <h1 onclick="inicio()" class="text-4xl font-black text-white tracking-tighter uppercase logo-font italic cursor-pointer">
                ZONE<span class="text-red-600">TECH</span>
            </h1>
            <p class="text-zinc-600 text-[10px] mt-1 font-bold tracking-widest uppercase">Protocolo de Recuperación de Acceso</p>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-bold text-white uppercase tracking-tight">¿Perdiste el acceso?</h2>
            <p onclick="significadoSecurityKey()" class="text-zinc-500 text-xs mt-2 leading-relaxed cursor-pointer hover:text-zinc-400 transition-colors">
                Introduce el correo electrónico vinculado a tu identidad. Te enviaremos un código de seguridad para restablecer tu <span class="text-red-600 font-bold">Clave de Seguridad</span>.
            </p>
        </div>

        <form action="#" method="POST" class="space-y-6">
            @csrf

            <div class="group">
                <label class="label-text">Dirección de Correo del Sistema</label>
                <div class="input-box">
                    <input type="email" name="email" placeholder="acceso@zonetech.pro" required class="input-field" />
                </div>
                @error('email')
                    <p class="text-[10px] text-red-600 mt-1 font-bold italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button type="submit" class="btn-submit w-full py-4 text-xs">
                    Enviar Enlace de Restauración
                </button>
            </div>
        </form>

        <div class="mt-10 flex items-center justify-between border-t border-zinc-900 pt-6">
            <a onclick="onLogin()" class="text-zinc-500 hover:text-white text-[10px] font-bold uppercase transition-colors cursor-pointer flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
                </svg>
                Regresar al Inicio de Sesión
            </a>
            <span class="text-zinc-700 text-[10px] font-bold tracking-widest uppercase">ID: PROTOCOLO-09</span>
        </div>

    </div>

    <script>
        // Atajos de navegación
        function inicio() { window.location.href = "inicio"; }
        function onLogin() { window.location.href = "login"; }
        function significadoSecurityKey(){ window.location.href = "securityKey"; }
    </script>
</body>

</html>
