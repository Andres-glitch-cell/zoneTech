<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Crear Cuenta</title>

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
            background-color: #030305;
        }

        h1,
        h2,
        .logo-font {
            font-family: 'Outfit', sans-serif;
        }

        /* --- CONTENEDOR CON LUZ FLUIDA --- */
        .contenedor-border-pro {
            position: relative;
            padding: 1.5px;
            border-radius: 16px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.03);
            transition: all 0.3s ease;
        }

        /* El haz de luz infinito y suave */
        .contenedor-border-pro::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg,
                    transparent 0%,
                    #ff3333 15%,
                    #a855f7 30%,
                    #06b6d4 45%,
                    transparent 60%);
            animation: rotate-border 4s linear infinite;
            opacity: 0;
            filter: blur(8px);
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

        /* Estado Activo (Focus o con Texto) */
        .contenedor-activo {
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.1);
            transform: translateY(-1px);
        }

        .contenedor-activo::before {
            opacity: 1;
        }

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

        /* Checkbox Estilo Original Refinado */
        .checkbox-wrapper {
            --checkbox-size: 22px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .checkbox-wrapper input {
            position: absolute;
            opacity: 0;
        }

        .checkbox-wrapper .checkmark {
            width: var(--checkbox-size);
            height: var(--checkbox-size);
            border: rgba(168, 85, 247, 0.4) 2px solid;
            border-radius: 6px;
            transition: all 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.02);
            position: relative;
            overflow: hidden;
        }

        .checkbox-wrapper input:checked~.checkmark {
            border-color: #ff3333;
            box-shadow: 0 0 10px rgba(255, 51, 51, 0.3);
        }

        .checkbox-wrapper .checkmark::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, #ff3333, #a855f7);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .checkbox-wrapper input:checked~.checkmark::after {
            opacity: 1;
        }

        .checkbox-wrapper svg {
            width: 14px;
            height: 14px;
            color: white;
            z-index: 1;
            transform: scale(0);
            transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .checkbox-wrapper input:checked~.checkmark svg {
            transform: scale(1);
        }
    </style>
</head>

<body class="bg-[#030305] min-h-screen flex items-center justify-center p-6 selection:bg-red-500/30">

    <div class="w-full max-w-[450px]" x-data="{
        name: '', email: '', password: '', terms: false,
        fName: false, fEmail: false, fPass: false
    }">

        <div class="text-center mb-8">
            <h1 onclick="window.location.href='/dashboard'" class="text-4xl font-black text-white tracking-tighter uppercase logo-font cursor-pointer group">
                Zone<span class="text-red-500 group-hover:text-cyan-400 transition-colors duration-500">Tech</span>
            </h1>
            <p class="text-zinc-600 text-[10px] font-bold uppercase tracking-[0.4em] mt-2">New Account Protocol</p>
        </div>

        <div class="bg-[#0d0d0f]/60 backdrop-blur-3xl border border-white/5 rounded-[2.5rem] p-10 shadow-2xl relative overflow-hidden">

            <div class="absolute -top-24 -right-24 w-48 h-48 bg-red-600/10 blur-[80px] rounded-full"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-violet-600/10 blur-[80px] rounded-full"></div>

            <h2 class="text-2xl font-bold mb-8 text-white text-center tracking-tight">Registro</h2>

            <form action="#" class="space-y-6 relative z-10">

                <div class="space-y-2">
                    <label class="block text-[9px] font-bold text-zinc-500 uppercase tracking-widest ml-2">Nombre de Usuario</label>
                    <div class="contenedor-border-pro" :class="(fName || name.length > 0) ? 'contenedor-activo' : ''">
                        <input type="text" x-model="name"
                            @focus="fName = true" @blur="fName = false"
                            placeholder="Alex Smith"
                            class="input-pro py-3.5 px-5 placeholder-zinc-800 transition-all" />
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-[9px] font-bold text-zinc-500 uppercase tracking-widest ml-2">Email Identity</label>
                    <div class="contenedor-border-pro" :class="(fEmail || email.length > 0) ? 'contenedor-activo' : ''">
                        <input type="email" x-model="email"
                            @focus="fEmail = true" @blur="fEmail = false"
                            placeholder="alex@zonetech.sys"
                            class="input-pro py-3.5 px-5 placeholder-zinc-800 transition-all" />
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-[9px] font-bold text-zinc-500 uppercase tracking-widest ml-2">Security Key</label>
                    <div class="contenedor-border-pro" :class="(fPass || password.length > 0) ? 'contenedor-activo' : ''">
                        <input type="password" x-model="password"
                            @focus="fPass = true" @blur="fPass = false"
                            placeholder="••••••••••••"
                            class="input-pro py-3.5 px-5 placeholder-zinc-800 transition-all" />
                    </div>
                </div>

                <div class="py-2 px-1">
                    <label class="checkbox-wrapper group">
                        <input type="checkbox" x-model="terms" />
                        <div class="checkmark">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <span class="ml-3 text-[10px] font-bold text-zinc-500 group-hover:text-zinc-300 transition-colors uppercase tracking-widest">
                            Acepto <a href="#" class="text-red-500 hover:text-cyan-400 underline transition-colors">Protocolos de Uso</a>
                        </span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-white text-black hover:bg-red-600 hover:text-white rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-xl transition-all duration-500 active:scale-95 group relative overflow-hidden">
                    <span class="relative z-10">Crear Perfil de Acceso</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-violet-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </button>

            </form>
        </div>

        <p class="text-center mt-8">
            <span class="text-zinc-600 text-[10px] font-bold uppercase tracking-widest">¿Ya tienes ID?</span>
            <button onclick="window.history.back()" class="ml-2 text-white text-[10px] font-black uppercase tracking-widest hover:text-red-500 transition-colors border-b border-red-900 pb-0.5">
                Volver al Login
            </button>
        </p>

    </div>

</body>

</html>