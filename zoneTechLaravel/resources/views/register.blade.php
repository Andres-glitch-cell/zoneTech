<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Registro Industrial</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #000000;
            /* Negro absoluto */
            color: #ffffff;
        }

        .logo-font {
            font-family: 'Outfit', sans-serif;
        }

        /* --- ESTILO INDUSTRIAL: LIMPIO Y REACTIVO --- */
        .input-box {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
        }

        /* Al entrar: Borde rojo sólido y resplandor suave */
        .input-box:focus-within {
            border-color: #dc2626;
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

        .input-field::placeholder {
            color: #333333;
        }

        /* Botón Estilo Pro */
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

        /* Etiquetas sutiles */
        .label-text {
            font-size: 10px;
            font-weight: 800;
            color: #444444;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 6px;
            display: block;
        }

        .input-box:focus-within+.label-text,
        .group:focus-within .label-text {
            color: #dc2626;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-[420px]">

        <div class="mb-10 text-left">
            <h1 class="text-4xl font-black text-white tracking-tighter uppercase logo-font italic">
                ZONE<span class="text-red-600">TECH</span>
            </h1>
            <p class="text-zinc-600 text-xs mt-1 font-medium">ESTABLISH NEW CORE IDENTITY</p>
        </div>

        <form action="/register" method="POST" class="space-y-5">
            <input type="hidden" name="_token" value="{{ csrf_token() ?? '' }}">

            <div class="group">
                <label class="label-text">User Identifier</label>
                <div class="input-box">
                    <input type="text" name="username" placeholder="e.g. andres.dev" required class="input-field" />
                </div>
            </div>

            <div class="group">
                <label class="label-text">System Email</label>
                <div class="input-box">
                    <input type="email" name="email" placeholder="access@zonetech.pro" required class="input-field" />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="group">
                    <label class="label-text">First Name</label>
                    <div class="input-box">
                        <input type="text" name="nombre" placeholder="Andres" required class="input-field" />
                    </div>
                </div>
                <div class="group">
                    <label class="label-text">Last Name</label>
                    <div class="input-box">
                        <input type="text" name="apellidos" placeholder="Garcia" required class="input-field" />
                    </div>
                </div>
            </div>

            <div class="group">
                <label class="label-text">Security Key</label>
                <div class="input-box">
                    <input type="password" name="password" placeholder="••••••••" required class="input-field" />
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-submit w-full py-4 text-xs">
                    Create Identity
                </button>
            </div>
        </form>

        <div class="mt-10 flex items-center justify-between border-t border-zinc-900 pt-6">
            <span class="text-zinc-700 text-[10px] font-bold tracking-widest uppercase">Encryption: AES-256</span>
            <a href="/login" class="text-zinc-500 hover:text-white text-[10px] font-bold uppercase transition-colors">
                Existing User? Login
            </a>
        </div>

    </div>

</body>

</html>