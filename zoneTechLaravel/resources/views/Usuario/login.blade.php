<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Acceso al Sistema</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ==========================================
           1. CONFIGURACIÓN GENERAL
           ========================================== */
        [x-cloak] { display: none !important; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #000000;
            color: #ffffff;
            -webkit-font-smoothing: antialiased;
        }

        .logo-font { font-family: 'Outfit', sans-serif; }

        /* ==========================================
           2. INPUTS Y FORMULARIOS (ESTILO INDUSTRIAL)
           ========================================== */
        .label-text {
            font-size: 10px;
            font-weight: 800;
            color: #444444;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 6px;
            display: block;
        }

        .input-box {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
        }

        .input-box:focus-within {
            border-color: #dc2626; /* Rojo ZoneTech */
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

        /* ==========================================
           4. COMPONENTE: INTERRUPTOR (TOGGLE)
           ========================================== */
        .switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 18px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #1a1a1a;
            transition: .3s;
            border-radius: 20px;
            border: 1px solid #333;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            left: 2px;
            bottom: 2px;
            background-color: #444;
            transition: .3s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: rgba(220, 38, 38, 0.1);
            border-color: #dc2626;
        }

        input:checked + .slider:before {
            transform: translateX(16px);
            background-color: #dc2626;
            box-shadow: 0 0 8px #dc2626;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-[420px]">

        <div class="mb-10 text-left">
            <h1 onclick="inicio()" class="text-4xl font-black text-white tracking-tighter uppercase logo-font italic cursor-pointer">
                ZONE<span class="text-red-600">TECH</span>
            </h1>
            <p class="text-zinc-600 text-[10px] mt-1 font-bold tracking-widest uppercase">Acceso Restringido al Sistema</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf

            <div class="group">
                <label class="label-text">Identificador de Usuario</label>
                <div class="input-box">
                    <input type="text" name="usuario" placeholder="Ejemplo: Andres.Dev" required class="input-field" />
                </div>
                @error('usuario')
                    <p class="text-[10px] text-red-600 mt-1 font-bold italic tracking-tight">{{ $message }}</p>
                @enderror
            </div>

            <div class="group">
                <div class="flex justify-between items-center">
                    <label class="label-text">Clave de Seguridad</label>
                    <a onclick="recuperarPasswd()" class="text-[9px] text-zinc-600 hover:text-red-500 uppercase font-bold mb-1 cursor-pointer transition-colors">¿Olvidaste la contraseña?</a>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="••••••••" required class="input-field" />
                </div>
            </div>

            <div class="flex items-center gap-3 py-2 group/toggle cursor-pointer">
                <label class="switch">
                    <input type="checkbox" name="remember" id="remember">
                    <span class="slider"></span>
                </label>
                <label for="remember" class="text-[10px] text-zinc-500 font-extrabold uppercase tracking-widest cursor-pointer group-hover/toggle:text-zinc-200 transition-colors">
                    Mantener Sesión Activa
                </label>
            </div>

            <div class="pt-2">
                <button type="submit" class="btn-submit w-full py-4 text-xs">
                    Entrar al Núcleo
                </button>
            </div>
        </form>

        <div class="mt-10 flex items-center justify-between border-t border-zinc-900 pt-6">
            <span class="text-zinc-700 text-[10px] font-bold tracking-widest uppercase">Seguridad: SSL-ACTIVO</span>
            <a onclick="onRegister()" class="text-zinc-500 hover:text-white text-[10px] font-bold uppercase transition-colors cursor-pointer">
                ¿Nuevo aquí? Crear Identidad
            </a>
        </div>

    </div>

    <script>
        function inicio() { window.location.href = "inicio" }
        function onRegister() { window.location.href = "register" }
        function recuperarPasswd(){ window.location.href = "recuperarContraseña" }
    </script>
</body>

</html>
