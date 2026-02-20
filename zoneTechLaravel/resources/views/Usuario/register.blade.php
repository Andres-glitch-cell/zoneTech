<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Registro de Identidad</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #000000;
            color: #ffffff;
            -webkit-font-smoothing: antialiased;
        }

        .logo-font { font-family: 'Outfit', sans-serif; }

        .label-text {
            font-size: 10px;
            font-weight: 800;
            color: #444444;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 6px;
            display: block;
            transition: color 0.2s ease;
        }

        .input-box {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
        }

        .input-box:focus-within {
            border-color: #dc2626;
            background: #111111;
            box-shadow: 0 0 15px rgba(220, 38, 38, 0.1);
        }

        .group:focus-within .label-text { color: #dc2626; }

        .input-field {
            background: transparent;
            width: 100%;
            padding: 14px 16px;
            outline: none;
            font-size: 0.9rem;
            color: #ffffff;
        }

        .input-field::placeholder { color: #333333; }

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

        .error-text {
            color: #dc2626;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            margin-top: 4px;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-[420px]">

        <div class="mb-10 text-left">
            <h1 onclick="inicio()" class="text-4xl font-black text-white tracking-tighter uppercase logo-font italic cursor-pointer">
                ZONE<span class="text-red-600">TECH</span>
            </h1>
            <p class="text-zinc-600 text-[10px] mt-1 font-bold tracking-widest uppercase">Crear Nueva Identidad en el Sistema</p>
        </div>

        <form action="/register" method="POST" class="space-y-5">
            @csrf 

            <div class="group">
                <label class="label-text">Identificador de Usuario</label>
                <div class="input-box">
                    <input type="text" name="usuario" placeholder="Ejemplo: Andres.Dev" value="{{ old('usuario') }}" required class="input-field" />
                </div>
                @error('usuario') <p class="error-text">{{ $message }}</p> @enderror
            </div>

            <div class="group">
                <label class="label-text">Correo Electrónico del Sistema</label>
                <div class="input-box">
                    <input type="email" name="email" placeholder="acceso@zonetech.pro" value="{{ old('email') }}" required class="input-field" />
                </div>
                @error('email') <p class="error-text">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="group">
                    <label class="label-text">Nombre</label>
                    <div class="input-box">
                        <input type="text" name="nombre" placeholder="Andrés" value="{{ old('nombre') }}" required class="input-field" />
                    </div>
                </div>
                <div class="group">
                    <label class="label-text">Apellido 1</label>
                    <div class="input-box">
                        <input type="text" name="apellido1" placeholder="García" value="{{ old('apellido1') }}" required class="input-field" />
                    </div>
                </div>
                <div class="group">
                    <label class="label-text">Apellido 2</label>
                    <div class="input-box">
                        <input type="text" name="apellido2" placeholder="López" value="{{ old('apellido2') }}" required class="input-field" />
                    </div>
                </div>
            </div>

            <div class="group">
                <label class="label-text">Contraseña</label>
                <div class="input-box">
                    <input type="password" name="password" placeholder="••••••••" required class="input-field" />
                </div>
                @error('password') <p class="error-text">{{ $message }}</p> @enderror
            </div>

            <div class="group">
                <label class="label-text">Confirmar Contraseña</label>
                <div class="input-box">
                    <input type="password" name="password_confirmation" placeholder="••••••••" required class="input-field" />
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-submit w-full py-4 text-xs">
                    Generar Identidad
                </button>
            </div>
        </form>

        <div class="mt-10 flex items-center justify-between border-t border-zinc-900 pt-6">
            <span class="text-zinc-700 text-[10px] font-bold tracking-widest uppercase">Cifrado: AES-256</span>
            <a href="/login" class="text-zinc-500 hover:text-white text-[10px] font-bold uppercase transition-colors">
                ¿Ya tienes cuenta? Inicia Sesión
            </a>
        </div>

    </div>

    <script>
        function inicio() { window.location.href = "/inicio"; }
    </script>
</body>
</html>