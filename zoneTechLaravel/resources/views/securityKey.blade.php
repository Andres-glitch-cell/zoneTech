<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Protocolos de Seguridad</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Outfit:wght@700;900&display=swap" rel="stylesheet">

<style>
        /* ==========================================
           1. CONFIGURACIÓN BASE Y TIPOGRAFÍA
           ========================================== */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #000000; /* Negro absoluto ZoneTech */
            color: #ffffff;
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased; /* Mejora lectura en Windows */
        }

        .logo-font {
            font-family: 'Outfit', sans-serif;
        }

        /* ==========================================
           2. COMPONENTES: TARJETAS (CARDS)
           ========================================== */
        .security-card {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            padding: 2rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .security-card:hover {
            border-color: #dc2626; /* Rojo Industrial */
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(220, 38, 38, 0.08);
        }

        /* ==========================================
           3. UI ELEMENTS: ESTADOS Y STATUS
           ========================================== */
        .status-dot {
            height: 8px;
            width: 8px;
            background-color: #dc2626;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
            box-shadow: 0 0 10px #dc2626;
            animation: pulse-glow 2s infinite;
        }

        /* Estilo para teclas KBD (Retro) */
        kbd {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }

        /* ==========================================
           4. SISTEMA DE ANIMACIONES
           ========================================== */
        @keyframes pulse-glow {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.4;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="p-6 md:p-12">

    <div class="max-w-5xl mx-auto">

        <header class="mb-16 border-b border-zinc-900 pb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h1 onclick="window.location.href='/inicio'" class="text-5xl font-black text-white tracking-tighter uppercase logo-font italic cursor-pointer">
                    ZONE<span class="text-red-600">TECH</span>
                </h1>
                <p class="text-zinc-500 text-xs mt-2 font-bold tracking-[0.2em] uppercase">
                    <span class="status-dot"></span> ¿QUÉ ES LA <b class="text-zinc-200">SECURITY KEY</b> EN ZONETECH?
                </p>
            </div>
            <div class="text-right">
                <span class="text-zinc-700 text-[10px] font-mono block">ENCRIPTACIÓN: AES-256-GCM</span>
            </div>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="security-card">
                <div class="text-red-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-white font-bold uppercase tracking-widest text-sm mb-3">Protección de Datos</h3>
                <p class="text-zinc-500 text-sm leading-relaxed">
                    Tus credenciales nunca se almacenan en texto plano. Utilizamos algoritmos de cifrado de última generación para asegurar que tu <span class="text-zinc-300">Clave de Seguridad (Security Key)</span> sea ilegible incluso para nuestros administradores de sistemas.
                </p>
            </div>

            <div class="security-card">
                <div class="text-red-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-white font-bold uppercase tracking-widest text-sm mb-3">Control de Acceso</h3>
                <p class="text-zinc-500 text-sm leading-relaxed">
                    Cada sesión en ZoneTech está protegida por un token único de seguridad. Esto evita ataques de suplantación de identidad, garantizando que solo tú puedas gestionar tus equipos y configuraciones industriales.
                </p>
            </div>

        </section>

        <div class="mt-12 bg-zinc-950 border-l-4 border-red-600 p-6">
            <h4 class="text-white font-bold text-xs uppercase mb-2 tracking-widest">Compromiso ZoneTech</h4>
            <p class="text-zinc-500 text-xs leading-relaxed italic">
                "La seguridad no es una opción, es la base de nuestro núcleo. Monitorizamos cada intento de acceso mediante protocolos de registro de actividad para asegurar la integridad total de nuestra base de datos."
            </p>
        </div>

        <footer class="mt-20 border-t border-zinc-900 pt-10 flex justify-between items-center">
            <button onclick="history.back()" class="text-zinc-500 hover:text-white text-[10px] font-bold uppercase transition-all flex items-center gap-2">
                <kbd class="bg-zinc-900 px-2 py-1 rounded border border-zinc-800 text-zinc-400">ESC</kbd> Volver al sistema
            </button>
            <p class="text-zinc-800 text-[10px] font-bold tracking-[0.3em]">NÚCLEO ZONE-TECH 2026</p>
        </footer>

    </div>

</body>

</html>
