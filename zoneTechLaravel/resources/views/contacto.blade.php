@extends('plantillaPrincipal')

@section('titulo', 'Contacto | ZoneTech')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&family=JetBrains+Mono:wght@400;800&display=swap" rel="stylesheet">

<style>
    :root {
        --zt-red: #ff0000;
        --zt-red-dim: #220000;
    }

    body { font-family: 'Outfit', sans-serif; background-color: #000; color: white; }
    .mono { font-family: 'JetBrains Mono', monospace; }

    .bg-grid {
        background-color: #000;
        background-image: radial-gradient(#1a1a1a 1px, transparent 1px);
        background-size: 30px 30px;
    }

    .glass-input {
        background: rgba(15, 15, 15, 0.8);
        border: 1px solid #333;
        color: white;
        transition: all 0.3s;
    }

    .glass-input:focus {
        border-color: var(--zt-red);
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.2);
        outline: none;
        background: rgba(25, 5, 5, 0.9);
    }

    .terminal-header {
        border-left: 4px solid var(--zt-red);
        padding-left: 15px;
    }

    .btn-send {
        background: white;
        color: black;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .btn-send:hover {
        background: var(--zt-red);
        color: white;
        box-shadow: 0 0 20px var(--zt-red);
    }
</style>
@endpush

@section('principal')
<div class="bg-grid min-h-screen pt-32 pb-20 px-6">

    <div class="max-w-7xl mx-auto">
        <div class="mb-16">
            <span class="mono text-red-600 text-xs tracking-[0.5em] uppercase block mb-2">Protocolo de Comunicación con el Personal</span>
            <h1 class="text-6xl md:text-8xl font-black uppercase tracking-tighter italic leading-none">
                Establecer <span class="text-red-600">Contacto</span>
            </h1>
            <p class="text-zinc-500 mt-4 text-lg font-light max-w-xl">
                ¿Tienes una consulta técnica o necesitas un despliegue de hardware personalizado? Envía tu señal a la central de **Andrés & Carolina**.
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-12">

            <div class="lg:col-span-7 bg-[#0a0a0a] border border-zinc-900 p-8 md:p-12 rounded-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 mono text-[10px] text-zinc-800 tracking-widest">SECURE_CHANNEL</div>

                <form action="#" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="mono text-xs text-zinc-500 uppercase tracking-widest">Identificador</label>
                            <input type="text" placeholder="Tu nombre" class="glass-input w-full p-4 rounded-sm text-sm" required>
                        </div>
                        <div class="space-y-2">
                            <label class="mono text-xs text-zinc-500 uppercase tracking-widest">Dirección de Enlace</label>
                            <input type="email" placeholder="email@ejemplo.com" class="glass-input w-full p-4 rounded-sm text-sm" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="mono text-xs text-zinc-500 uppercase tracking-widest">Asunto del Ticket</label>
                        <select class="glass-input w-full p-4 rounded-sm text-sm appearance-none cursor-pointer">
                            <option>Consulta Técnica / Hardware</option>
                            <option>Presupuesto Personalizado</option>
                            <option>Soporte Post-Venta</option>
                            <option>Otros Asuntos</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="mono text-xs text-zinc-500 uppercase tracking-widest">Mensaje Encriptado</label>
                        <textarea rows="5" placeholder="Escribe aquí tu mensaje..." class="glass-input w-full p-4 rounded-sm text-sm resize-none"></textarea>
                    </div>

                    <button type="submit" class="btn-send w-full py-5 text-sm tracking-widest">
                        Transmitir Datos
                    </button>
                </form>
            </div>

            <div class="lg:col-span-5 space-y-8">

                <div class="bg-zinc-900/30 border border-zinc-800 p-8 rounded-sm">
                    <h3 class="mono text-red-600 text-xs font-black uppercase tracking-widest mb-6 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Ubicación Base
                    </h3>
                    <p class="text-xl font-bold italic mb-2">Central Node - Benicarló</p>
                    <p class="text-zinc-500 text-sm leading-relaxed font-light italic">
                        Valencian Community, Spain.<br>
                        Sincronización horaria: GMT+1
                    </p>
                </div>

                <div class="bg-zinc-900/30 border border-zinc-800 p-8 rounded-sm">
                    <h3 class="mono text-red-600 text-xs font-black uppercase tracking-widest mb-6 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Canales de Enlace
                    </h3>
                    <ul class="space-y-4">
                        <li class="flex items-center group cursor-pointer">
                            <div class="w-10 h-10 border border-zinc-800 flex items-center justify-center group-hover:border-red-600 transition-colors">
                                <svg class="w-5 h-5 stroke-zinc-500 group-hover:stroke-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <span class="ml-4 text-sm text-zinc-400 group-hover:text-white transition-colors">comms@zonetech.dev</span>
                        </li>
                        <li class="flex items-center group cursor-pointer">
                            <div class="w-10 h-10 border border-zinc-800 flex items-center justify-center group-hover:border-red-600 transition-colors">
                                <svg class="w-5 h-5 stroke-zinc-500 group-hover:stroke-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                            </div>
                            <span class="ml-4 text-sm text-zinc-400 group-hover:text-white transition-colors">linkedin.com/in/zonetech</span>
                        </li>
                    </ul>
                </div>

                <div class="border border-red-900/30 p-6 rounded-sm bg-red-900/5 flex items-center justify-between">
                    <div>
                        <span class="block mono text-[10px] text-red-600 font-bold tracking-widest uppercase text-left">System Status</span>
                        <span class="text-white font-bold text-sm tracking-tighter">Operativo</span>
                    </div>
                    <div class="flex space-x-1">
                        <div class="w-1 h-4 bg-red-600 animate-pulse"></div>
                        <div class="w-1 h-4 bg-red-600 animate-pulse" style="animation-delay: 0.2s"></div>
                        <div class="w-1 h-4 bg-red-600 animate-pulse" style="animation-delay: 0.4s"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection 
