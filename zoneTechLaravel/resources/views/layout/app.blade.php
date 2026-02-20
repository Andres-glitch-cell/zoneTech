<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZoneTech – Sistema de Gestión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; background-color: #000000; color: #ffffff; -webkit-font-smoothing: antialiased; }
        .logo-font { font-family: 'Outfit', sans-serif; }
        .label-text { font-size: 10px; font-weight: 800; color: #444444; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 6px; display: block; }
        .input-box { background: #0a0a0a; border: 1px solid #1a1a1a; border-radius: 8px; transition: all 0.2s ease-in-out; }
        .input-box:focus-within { border-color: #dc2626; background: #111111; box-shadow: 0 0 15px rgba(220, 38, 38, 0.1); }
        .input-field { background: transparent; width: 100%; padding: 14px 16px; outline: none; font-size: 0.9rem; color: #ffffff; }
        .btn-submit { background: #ffffff; color: #000000; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.3s ease; border-radius: 8px; }
        .btn-submit:hover { background: #dc2626; color: #ffffff; transform: translateY(-1px); }
        .custom-option { transition: all 0.2s ease; border-left: 3px solid transparent; }
        .custom-option:hover { background: rgba(220, 38, 38, 0.1); border-left: 3px solid #dc2626; }
        .dropdown-panel { box-shadow: 0 10px 40px -10px rgba(0,0,0,0.7), 0 0 20px rgba(220,38,38,0.05); }
    </style>
</head>
<body>

    {{-- Aquí es donde se inyecta el login o el registro --}}
    @yield('content')

    {{-- SISTEMA DE NOTIFICACIONES --}}
    @if(session('error') || session('success'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 5000)" 
             @click="show = false" 
             class="fixed bottom-6 right-6 z-[9999] max-w-sm cursor-pointer">
            <div class="px-6 py-4 rounded-lg shadow-2xl border flex items-center gap-4 {{ session('error') ? 'bg-black border-red-600' : 'bg-black border-green-600' }}">
                <div class="{{ session('error') ? 'text-red-600' : 'text-green-600' }}">
                    {!! session('error') ? '⚠️' : '✅' !!}
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase text-zinc-500">Notificación</p>
                    <p class="text-xs font-bold text-white uppercase italic">{{ session('error') ?? session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

</body>
</html>