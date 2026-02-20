@extends('plantillaPrincipal')

@section('titulo', 'Inicio | ZoneTech Core')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&family=JetBrains+Mono:wght@400;800&display=swap" rel="stylesheet">

<style>
    :root { --zt-red: #ff2a2a; }
    body { font-family: 'Outfit', sans-serif; background-color: #000; color: white; overflow-x: hidden; }
    .mono { font-family: 'JetBrains Mono', monospace; }

    .bg-grid {
        background-color: #000;
        background-image: radial-gradient(#1a1a1a 1px, transparent 1px);
        background-size: 40px 40px;
    }

    /* Animación de Banner Publicitario */
    .promo-gradient {
        background: linear-gradient(90deg, #000, #440000, #000);
        background-size: 200% 100%;
        animation: gradientMove 6s linear infinite;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }

    .hero-title {
        font-size: clamp(3rem, 10vw, 8rem);
        line-height: 0.8;
    }

    .glass-panel {
        background: rgba(10, 10, 10, 0.8);
        border: 1px solid #222;
        backdrop-filter: blur(10px);
        transition: all 0.3s;
    }

    .glass-panel:hover { border-color: var(--zt-red); }

    .glow-text { text-shadow: 0 0 15px rgba(255, 42, 42, 0.5); }
</style>
@endpush

@section('principal')
<div class="bg-grid min-h-screen">

    <header class="relative pt-40 pb-20 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <div class="inline-block border border-red-600 px-4 py-1 mb-6">
                <span class="mono text-red-600 text-[10px] tracking-[0.4em] uppercase font-bold">Sistema Online // v.2026.1</span>
            </div>
            <h1 class="hero-title font-black uppercase tracking-tighter mb-8">
                MEJORA<br><span class="text-red-600 glow-text">TU REALIDAD</span>
            </h1>
            <p class="text-zinc-500 max-w-xl mx-auto text-lg font-light leading-relaxed">
                Ingeniería de élite bajo la dirección de <span class="text-white font-bold">Andrés & Carolina</span>.
                Hardware diseñado para romper los límites del rendimiento convencional.
            </p>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-6 mb-24">
        <div class="promo-gradient border border-red-900/50 p-1 rounded-sm">
            <div class="bg-black p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8">
                <div>
                    <span class="bg-red-600 text-white text-[10px] font-black px-2 py-1 uppercase mono mb-4 inline-block">Oferta Limitada</span>
                    <h2 class="text-4xl font-black uppercase italic mb-2">RTX 5090 Super <span class="text-red-600">Edición</span></h2>
                    <p class="text-zinc-400 mono text-sm font-light uppercase tracking-widest">Optimizado por los Laboratorios ZoneTech</p>
                </div>
                <div class="text-right">
                    <div class="text-5xl font-black mb-4 italic tracking-tighter">1.299€</div>
                    <a href="#" class="bg-white text-black px-8 py-3 font-black uppercase text-xs hover:bg-red-600 hover:text-white transition-all inline-block">Adquirir Ahora</a>
                </div>
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 pb-24">
        <div class="grid lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-8">
                <div class="flex items-center justify-between border-b border-zinc-800 pb-4">
                    <h3 class="text-2xl font-black uppercase italic tracking-tighter">Últimos Despliegues</h3>
                    <span class="mono text-[10px] text-zinc-600 font-bold uppercase tracking-widest">Registro_Global</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="glass-panel p-6 group cursor-pointer">
                        <div class="flex items-center space-x-2 mb-4">
                            <span class="w-2 h-2 bg-red-600"></span>
                            <span class="mono text-[10px] text-zinc-500 uppercase font-bold">Novedades Hardware</span>
                        </div>
                        <h4 class="text-lg font-bold uppercase mb-3 group-hover:text-red-600 transition-colors italic">Refrigeración Líquida de Andrés: 15°C menos en carga alta.</h4>
                        <p class="text-zinc-500 text-sm font-light leading-relaxed">Nuevo sistema de disipación por nitrógeno optimizado para estaciones de trabajo extremas...</p>
                    </div>

                    <div class="glass-panel p-6 group cursor-pointer">
                        <div class="flex items-center space-x-2 mb-4">
                            <span class="w-2 h-2 bg-zinc-700"></span>
                            <span class="mono text-[10px] text-zinc-500 uppercase font-bold">Reporte de Mercado</span>
                        </div>
                        <h4 class="text-lg font-bold uppercase mb-3 group-hover:text-red-600 transition-colors italic">Expansión ZoneTech: Apertura del Nodo Madrid.</h4>
                        <p class="text-zinc-500 text-sm font-light leading-relaxed">Carolina lidera el despliegue del segundo centro logístico avanzado para reducir tiempos de entrega...</p>
                    </div>
                </div>

                <div class="bg-zinc-900 border border-zinc-800 h-48 flex items-center justify-center relative overflow-hidden group">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1547082299-de196ea013d6?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center opacity-20 grayscale group-hover:grayscale-0 transition-all duration-700"></div>
                    <div class="relative z-10 text-center px-4">
                        <h5 class="text-2xl font-black uppercase italic">¿Buscas potencia a medida?</h5>
                        <p class="mono text-xs text-red-600 uppercase tracking-[0.3em] mt-2 font-bold">Configurador de Sistemas Personalizado Activo</p>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="glass-panel p-8">
                    <h3 class="mono text-xs text-red-600 font-black uppercase tracking-widest mb-8">Estado_del_Sistema</h3>
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between text-[10px] mono uppercase mb-2">
                                <span>Energía Global</span>
                                <span>94%</span>
                            </div>
                            <div class="w-full bg-zinc-900 h-1">
                                <div class="bg-red-600 h-full" style="width: 94%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-[10px] mono uppercase mb-2">
                                <span>Estabilidad de Nodos</span>
                                <span>99.9%</span>
                            </div>
                            <div class="w-full bg-zinc-900 h-1">
                                <div class="bg-red-600 h-full" style="width: 99.9%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-red-600 p-8 text-black group hover:bg-white transition-all cursor-pointer">
                    <svg class="w-10 h-10 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <h4 class="text-2xl font-black uppercase italic leading-none mb-2">Soporte VIP</h4>
                    <p class="text-xs font-bold uppercase leading-tight">Contacto directo con Andrés & Carolina para configuraciones de alto nivel.</p>
                </div>

                <div class="flex justify-between gap-4">
                    <a href="#" class="glass-panel flex-1 py-4 flex items-center justify-center hover:bg-zinc-900 transition-colors">
                        <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="glass-panel flex-1 py-4 flex items-center justify-center hover:bg-zinc-900 transition-colors">
                        <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-12 border-t border-zinc-900 bg-black text-center">
        <p class="mono text-[10px] text-zinc-600 tracking-[0.5em] uppercase">
            Sede Central ZoneTech // Fundada en 2026 // Base Benicarló
        </p>
    </footer>
</div>
@endsection
