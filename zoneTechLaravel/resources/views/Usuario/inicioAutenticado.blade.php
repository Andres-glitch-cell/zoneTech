@extends('plantillaPrincipal')

@section('titulo', 'Panel de Control | ZoneTech')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* Estética Industrial ZoneTech */
    .dashboard-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 40px 0;
        border-bottom: 1px solid #111;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .avatar-circle {
        width: 68px;
        height: 68px;
        background: linear-gradient(135deg, #dc2626 0%, #7f1d1d 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Outfit', sans-serif;
        font-weight: 900;
        font-size: 1.5rem;
        color: white;
        box-shadow: 0 0 25px rgba(220, 38, 38, 0.4);
        border: 2px solid rgba(255, 255, 255, 0.1);
    }

    .welcome-text h1 {
        font-family: 'Outfit', sans-serif;
        font-size: 2.0rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #fff;
        margin: 0;
    }

    /* Tarjetas de Navegación */
    .nav-card {
        background: rgba(15, 15, 15, 0.6);
        border: 1px solid #222;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        overflow: hidden;
    }

    .nav-card:hover {
        border-color: #ff2a2a;
        transform: translateY(-5px);
        background: rgba(20, 20, 20, 0.8);
    }

    .nav-card::before {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 2px;
        background: #ff2a2a;
        transform: scaleX(0);
        transition: transform 0.4s;
        transform-origin: left;
    }

    .nav-card:hover::before {
        transform: scaleX(1);
    }

    .status-tag {
        font-size: 9px;
        font-weight: 900;
        color: #ff2a2a;
        text-transform: uppercase;
        letter-spacing: 0.3em;
        margin-top: 4px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
</style>
@endpush

@section('principal')
<div class="max-w-5xl mx-auto px-6">

    <header class="dashboard-header">
        <div class="header-left">
            <div class="avatar-circle">
                {{ Auth::user()->iniciales }}
            </div>

            <div class="welcome-text">
                <h1>Bienvenido, {{ Auth::user()->nombre }}<span class="text-red-600">.</span></h1>
                <div class="status-tag">
                    <span class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></span>
                    Terminal de Usuario Activa
                </div>
            </div>
        </div>
    </header>

    <main class="py-12">
        <div class="grid md:grid-cols-2 gap-8">

            <a href="{{ route('inicio') }}" class="nav-card p-8 group">
                <div class="flex justify-between items-start mb-6">
                    <div class="p-3 bg-zinc-900 border border-zinc-800 group-hover:border-red-600/50 transition-colors">
                        <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="font-mono text-[10px] text-zinc-600 uppercase">Redirección_01</span>
                </div>
                <h2 class="text-xl font-black uppercase italic mb-2 tracking-tighter">Pantalla Principal</h2>
                <p class="text-zinc-500 text-sm font-light leading-relaxed">
                    Regresa a la central de noticias y publicidad de ZoneTech. Revisa las últimas ofertas y actualizaciones del sistema.
                </p>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-bold text-red-600 uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity">
                    Acceder ahora <span class="animate-bounce-x">→</span>
                </div>
            </a>

            <a href="{{ route('productos') }}" class="nav-card p-8 group">
                <div class="flex justify-between items-start mb-6">
                    <div class="p-3 bg-zinc-900 border border-zinc-800 group-hover:border-red-600/50 transition-colors">
                        <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="font-mono text-[10px] text-zinc-600 uppercase">Redirección_02</span>
                </div>
                <h2 class="text-xl font-black uppercase italic mb-2 tracking-tighter">Explorar Inventario</h2>
                <p class="text-zinc-500 text-sm font-light leading-relaxed">
                    Accede a nuestra base de datos de hardware. Portátiles, sobremesas y componentes de alto rendimiento optimizados.
                </p>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-bold text-red-600 uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity">
                    Abrir Catálogo <span class="animate-bounce-x">→</span>
                </div>
            </a>

        </div>

        <div class="mt-12 p-8 border-t border-zinc-900 flex flex-col md:flex-row gap-8 items-center justify-between">
            <div class="mono text-[10px] text-zinc-500 uppercase tracking-[0.2em]">
                Identificador Único: <span class="text-white">ZT-{{ Auth::user()->id }}-{{ date('Y') }}</span>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('perfil') }}" class="text-[10px] font-bold uppercase tracking-widest text-zinc-400 hover:text-white transition-colors">Ajustes de Perfil</a>
                <span class="text-zinc-800">/</span>
                <a href="#" class="text-[10px] font-bold uppercase tracking-widest text-zinc-400 hover:text-white transition-colors">Historial de Pedidos</a>
            </div>
        </div>
    </main>

</div>
@endsection

@push('scripts')
<script>
    // Atajo de teclado Windows: Alt + P para ir a Productos rápido
    document.addEventListener('keydown', function(e) {
        if (e.altKey && e.key === 'p') {
            window.location.href = "{{ route('productos') }}";
        }
    });
</script>
@endpush
