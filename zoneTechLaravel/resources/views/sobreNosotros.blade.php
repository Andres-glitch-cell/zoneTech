@extends('plantillaPrincipal')

@section('titulo', 'Sobre Nosotros | ZoneTech')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&family=JetBrains+Mono:wght@400;800&display=swap" rel="stylesheet">

<style>
    :root {
        --zt-red: #ff0000;
        --zt-red-dim: #440000;
    }

    body { font-family: 'Outfit', sans-serif; background-color: #000; }
    .mono { font-family: 'JetBrains Mono', monospace; }

    .bg-grid {
        background-color: #000;
        background-image: radial-gradient(#1a1a1a 1px, transparent 1px);
        background-size: 40px 40px;
    }

    .glass-card {
        background: rgba(10, 10, 10, 0.9);
        border: 1px solid #222;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .glass-card:hover {
        border-color: var(--zt-red);
        box-shadow: 0 0 30px rgba(255, 0, 0, 0.15);
        transform: translateY(-8px);
    }

    .scan-line {
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--zt-red), transparent);
        position: absolute;
        animation: scanMove 4s linear infinite;
    }

    @keyframes scanMove {
        0% { top: 0%; opacity: 0; }
        50% { opacity: 0.5; }
        100% { top: 100%; opacity: 0; }
    }

    .founder-svg {
        width: 64px;
        height: 64px;
        fill: none;
        stroke: #555;
        stroke-width: 1.2;
        transition: all 0.4s;
    }

    .group:hover .founder-svg {
        stroke: var(--zt-red);
        filter: drop-shadow(0 0 10px rgba(255, 0, 0, 0.5));
    }
</style>
@endpush

@section('principal')
<div class="bg-grid text-white min-h-screen">

    <header class="relative pt-32 pb-20 px-6 text-center">
        <div class="max-w-7xl mx-auto relative z-10">
            <span class="mono text-red-600 text-xs tracking-[0.6em] uppercase mb-4 block">Established // 2026</span>
            <h1 class="text-7xl md:text-9xl font-black tracking-tighter mb-6 leading-none uppercase">
                ZONE<span class="text-red-600">TECH</span>
            </h1>
            <p class="text-zinc-500 max-w-2xl mx-auto text-xl font-light tracking-wide">
                Liderado por <span class="text-white font-bold tracking-tight">Andrés & Carolina</span>.
                Ingeniería de sistemas para la nueva era del hardware.
            </p>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-6 pb-24">

        <div class="grid lg:grid-cols-2 gap-10 mb-32">
            <div class="glass-card p-10 rounded-xl">
                <div class="scan-line"></div>
                <div class="mb-6">
                    <svg class="w-12 h-12 stroke-red-600" viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" d="M20 7L12 3L4 7M20 7L12 11M20 7V17L12 21M12 11L4 7M12 11V21M4 7V17L12 21"/></svg>
                </div>
                <h2 class="text-red-600 mono text-sm font-bold mb-4 tracking-widest uppercase">/ Core Mission</h2>
                <p class="text-3xl font-bold mb-6 italic leading-tight">"Potencia bruta, control absoluto."</p>
                <p class="text-zinc-400 text-lg leading-relaxed font-light">
                    En ZoneTech, el rendimiento no es negociable. Diseñamos ecosistemas donde el hardware y la eficiencia convergen.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="glass-card p-8 rounded-xl text-center flex flex-col items-center justify-center">
                    <span class="text-5xl font-black block text-white mb-2 italic">500+</span>
                    <span class="mono text-[10px] text-zinc-500 uppercase tracking-[0.2em]">Nodos Activos</span>
                </div>
                <div class="glass-card p-8 rounded-xl text-center flex flex-col items-center justify-center border-red-900/30">
                    <span class="text-5xl font-black block text-red-600 mb-2 italic">99.9</span>
                    <span class="mono text-[10px] text-zinc-500 uppercase tracking-[0.2em]">Integridad</span>
                </div>
            </div>
        </div>

        <div class="text-center mb-16">
            <h2 class="text-5xl font-black uppercase tracking-tight italic">The <span class="text-red-600">Founders</span></h2>
            <div class="w-24 h-1 bg-red-600 mx-auto mt-4"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            <div class="glass-card p-10 rounded-2xl text-center group">
                <div class="w-24 h-24 bg-zinc-900/50 rounded-full mx-auto mb-8 flex items-center justify-center border border-zinc-800 transition-all group-hover:border-red-600">
                    <svg class="founder-svg" viewBox="0 0 24 24">
                        <path d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold mb-1 uppercase tracking-tighter italic">Andrés</h3>
                <span class="mono text-red-600 text-[10px] font-bold tracking-[0.3em] mb-6 block uppercase">Chief Technology Officer</span>
                <p class="text-zinc-500 leading-relaxed font-light">
                    Arquitecto de sistemas. Especialista en optimización de código e infraestructura crítica de hardware de alto rendimiento.
                </p>
            </div>

            <div class="glass-card p-10 rounded-2xl text-center group">
                <div class="w-24 h-24 bg-zinc-900/50 rounded-full mx-auto mb-8 flex items-center justify-center border border-zinc-800 transition-all group-hover:border-red-600">
                    <svg class="founder-svg" viewBox="0 0 24 24">
                        <path d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM18 21v-2c0-2.21-1.79-4-4-4H10c-2.21 0-4 1.79-4 4v2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 14v2c0 1.1-.9 2-2 2h-4c-1.1 0-2-.9-2-2v-2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold mb-1 uppercase tracking-tighter italic">Carolina</h3>
                <span class="mono text-red-600 text-[10px] font-bold tracking-[0.3em] mb-6 block uppercase">Chief Operations Officer</span>
                <p class="text-zinc-500 leading-relaxed font-light">
                    Líder en estrategia operativa. Gestiona la expansión de la marca y garantiza que la experiencia del usuario sea impecable.
                </p>
            </div>
        </div>

        <div class="mt-32 glass-card p-16 text-center rounded-2xl border-zinc-800">
            <h3 class="text-4xl font-black uppercase mb-8 italic tracking-tight">¿Siguiente fase?</h3>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="{{ route('productos') }}" class="px-10 py-4 bg-white text-black font-black uppercase text-xs tracking-widest hover:bg-red-600 hover:text-white transition-all">
                    Catálogo
                </a>
                <a href="{{ route('contacto') }}" class="px-10 py-4 border border-zinc-700 text-white font-black uppercase text-xs tracking-widest hover:border-red-600 transition-all">
                    Contacto
                </a>
            </div>
        </div>

    </div>

    <footer class="py-12 border-t border-zinc-900 text-center">
        <p class="mono text-[10px] text-zinc-600 tracking-[0.5em] uppercase">
            ZoneTech OS // 2026 // Propiedad de Andrés & Carolina
        </p>
    </footer>
</div>
@endsection
