@extends('plantillaPrincipal')

@section('titulo', 'Soporte Técnico | ZoneTech')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&family=JetBrains+Mono:wght@400;800&display=swap" rel="stylesheet">

<style>
    :root {
        --zt-red: #ff2a2a;
    }

    body { font-family: 'Outfit', sans-serif; background-color: #000; color: white; }
    .mono { font-family: 'JetBrains Mono', monospace; }

    .bg-grid {
        background-color: #000;
        background-image: radial-gradient(#1a1a1a 1px, transparent 1px);
        background-size: 30px 30px;
    }

    .support-card, .forum-post {
        background: rgba(10, 10, 10, 0.9);
        border: 1px solid #1a1a1a;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .support-card:hover {
        border-color: var(--zt-red);
        transform: scale(1.02);
    }

    .status-dot {
        width: 8px;
        height: 8px;
        background: var(--zt-red);
        border-radius: 50%;
        display: inline-block;
        margin-right: 8px;
        box-shadow: 0 0 10px var(--zt-red);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(1.2); }
        100% { opacity: 1; transform: scale(1); }
    }

    .tech-svg {
        width: 40px; height: 40px; stroke: var(--zt-red); stroke-width: 1.5; fill: none;
    }

    /* Estilos específicos para el foro */
    .user-avatar {
        width: 35px; height: 35px; border: 1px solid #333; display: flex; align-items: center; justify-content: center; background: #111;
    }
</style>
@endpush

@section('principal')
<div class="bg-grid min-h-screen pt-32 pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-20">
            <span class="mono text-red-600 text-xs tracking-[0.5em] uppercase block mb-4">Diagnostics_Center // Level_01</span>
            <h1 class="text-6xl md:text-8xl font-black uppercase tracking-tighter italic leading-none mb-6">
                Soporte <span class="text-red-600">Técnico</span>
            </h1>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-20">
            <div class="support-card p-8 rounded-sm">
                <svg class="tech-svg mb-6" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                <h3 class="text-xl font-black uppercase italic mb-3">Hardware</h3>
                <p class="text-zinc-500 text-sm font-light">Reparación física y componentes.</p>
            </div>
            <div class="support-card p-8 rounded-sm">
                <svg class="tech-svg mb-6" viewBox="0 0 24 24"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
                <h3 class="text-xl font-black uppercase italic mb-3">Optimización</h3>
                <p class="text-zinc-500 text-sm font-light">Finetuning y Overclocking.</p>
            </div>
            <div class="support-card p-8 rounded-sm">
                <svg class="tech-svg mb-6" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <h3 class="text-xl font-black uppercase italic mb-3">Seguridad</h3>
                <p class="text-zinc-500 text-sm font-light">Auditoría de integridad.</p>
            </div>
            <div class="support-card p-8 rounded-sm">
                <svg class="tech-svg mb-6" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                <h3 class="text-xl font-black uppercase italic mb-3">Monitoreo</h3>
                <p class="text-zinc-500 text-sm font-light">Uptime y telemetría 24/7.</p>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 mb-24">
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-zinc-900/50 border border-zinc-800 p-8 rounded-sm">
                    <div class="flex items-center mb-6">
                        <span class="status-dot"></span>
                        <span class="mono text-xs uppercase tracking-widest text-zinc-400">Agentes en línea</span>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-zinc-800 pb-2">
                            <span class="text-sm font-bold">Andrés (Tech Lead)</span>
                            <span class="text-[10px] mono text-red-600 uppercase font-bold">Online</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-zinc-800 pb-2">
                            <span class="text-sm font-bold">Carolina (Ops)</span>
                            <span class="text-[10px] mono text-red-600 uppercase font-bold">Online</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 bg-[#050505] border border-zinc-800 rounded-sm p-8">
                <h2 class="text-2xl font-black uppercase italic mb-6 flex items-center">
                    <span class="w-8 h-[1px] bg-red-600 mr-4"></span>
                    Abrir Ticket
                </h2>
                <form action="#" class="grid md:grid-cols-2 gap-4">
                    <input type="text" placeholder="ID PRODUCTO" class="bg-zinc-900 border border-zinc-800 p-3 text-xs mono outline-none focus:border-red-600 transition-all uppercase">
                    <select class="bg-zinc-900 border border-zinc-800 p-3 text-xs mono outline-none focus:border-red-600 transition-all uppercase">
                        <option>Prioridad: Normal</option>
                        <option>Prioridad: Alta</option>
                    </select>
                    <textarea placeholder="SÍNTOMA..." class="md:col-span-2 bg-zinc-900 border border-zinc-800 p-3 text-xs mono outline-none focus:border-red-600 h-24 resize-none uppercase"></textarea>
                    <button class="md:col-span-2 bg-red-600 text-white font-black py-4 uppercase text-[10px] tracking-widest hover:bg-red-700 transition-all">Iniciar Protocolo</button>
                </form>
            </div>
        </div>

        <div class="mt-12">
            <h2 class="text-3xl font-black uppercase italic mb-8 flex items-center">
                <svg class="w-6 h-6 mr-3 stroke-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>
                Foro / Dudas por la Comunidad
            </h2>

            <div class="space-y-4">
                <div class="forum-post p-6 rounded-sm flex gap-6 items-start border-l-2 border-l-zinc-700">
                    <div class="user-avatar text-xs mono text-zinc-500">U_01</div>
                    <div class="flex-1">
                        <div class="flex justify-between mb-2">
                            <span class="mono text-xs text-red-600 font-bold">@Andrés</span>
                            <span class="mono text-[10px] text-zinc-600 uppercase">2 min ago</span>
                        </div>
                        <p class="text-zinc-400 text-sm leading-relaxed">
                            ¿Alguien más tiene problemas térmicos con la última build? Mi GPU llega a 85°C en idle.
                        </p>
                    </div>
                </div>

                <div class="forum-post p-6 rounded-sm flex gap-6 items-start border-l-2 border-l-red-600 bg-red-900/5">
                    <div class="user-avatar text-xs mono text-red-600 border-red-900">SYS</div>
                    <div class="flex-1">
                        <div class="flex justify-between mb-2">
                            <span class="mono text-xs text-white font-bold">Andrés</span>
                            <span class="mono text-[10px] text-zinc-600 uppercase">Just now</span>
                        </div>
                        <p class="text-zinc-300 text-sm leading-relaxed">
                            <span class="text-red-600 font-bold">@Juan Pérez:</span> Detectado flujo de aire obstruido. Revisa el ventilador del nodo 3.
                        </p>
                    </div>
                </div>

                <div class="forum-post p-6 rounded-sm flex gap-6 items-start border-l-2 border-l-zinc-700">
                    <div class="user-avatar text-xs mono text-zinc-500">U_02</div>
                    <div class="flex-1">
                        <div class="flex justify-between mb-2">
                            <span class="mono text-xs text-zinc-400 font-bold">@Alba Martínez</span>
                            <span class="mono text-[10px] text-zinc-600 uppercase">1 hour ago</span>
                        </div>
                        <p class="text-zinc-400 text-sm leading-relaxed">
                            Sincronización de periféricos fallida en el arranque frío. ¿Algún script para forzar el reinicio del bus USB?
                        </p>
                    </div>
                </div>

                <div class="forum-post p-6 rounded-sm flex gap-6 items-start border-l-2 border-l-zinc-700">
                    <div class="user-avatar text-xs mono text-zinc-500">U_03</div>
                    <div class="flex-1">
                        <div class="flex justify-between mb-2">
                            <span class="mono text-xs text-zinc-400 font-bold">@Carol_Fan</span>
                            <span class="mono text-[10px] text-zinc-600 uppercase">3 hours ago</span>
                        </div>
                        <p class="text-zinc-400 text-sm leading-relaxed">
                            ¡La nueva configuración de latencia de Carolina ha funcionado! 5ms menos de lag en el core.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <button class="mono text-[10px] uppercase tracking-[0.3em] text-zinc-600 hover:text-red-600 transition-colors">
                    >> Ver todos los hilos (424)
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
