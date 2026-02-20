@extends('plantillaPrincipal')

@section('titulo', 'Inventario de Hardware | ZoneTech')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;900&family=JetBrains+Mono:wght@400;800&display=swap" rel="stylesheet">

<style>
    :root { --zt-red: #ff2a2a; }
    body { font-family: 'Outfit', sans-serif; background-color: #000; color: white; }
    .mono { font-family: 'JetBrains Mono', monospace; }

    .bg-grid {
        background-color: #000;
        background-image: radial-gradient(#1a1a1a 1px, transparent 1px);
        background-size: 30px 30px;
    }

    /* Barra Lateral Estilo Terminal */
    .productos-categorias {
        width: 300px;
        background: rgba(10, 10, 10, 0.95);
        border-right: 1px solid #1a1a1a;
        padding: 40px 24px;
        position: sticky;
        top: 0;
        height: 100vh;
        overflow-y: auto;
    }

    .productos-titulo {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--zt-red);
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 40px;
        border-left: 3px solid var(--zt-red);
        padding-left: 15px;
    }

    .categoria-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 12px 16px;
        color: #888;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent;
        margin-bottom: 8px;
    }

    .categoria-item:hover {
        color: white;
        background: rgba(255, 42, 42, 0.05);
        border-color: rgba(255, 42, 42, 0.2);
        transform: translateX(8px);
    }

    /* Botón Admin Estilo "Override" */
    .btn-admin {
        background: #fff;
        color: #000;
        padding: 12px 24px;
        font-weight: 900;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        border: none;
        margin-bottom: 40px;
    }

    .btn-admin:hover {
        background: var(--zt-red);
        color: white;
        box-shadow: 0 0 20px rgba(255, 42, 42, 0.4);
    }

    .contenedor-productos {
        display: flex;
        min-height: 100vh;
    }

    .contenido-principal {
        flex: 1;
        padding: 60px;
        background: transparent;
    }

    .status-badge {
        font-size: 10px;
        color: #444;
        margin-left: auto;
    }
</style>
@stack('estilo-categorias')
@endpush

@section('principal')
<div class="bg-grid">
    <div class="contenedor-productos">
        <aside class="productos-categorias">
            <h3 class="productos-titulo">Inventario_Sistemas</h3>

            <nav class="menu-categorias">
                <div class="mono text-[10px] text-zinc-600 font-black uppercase mb-6 tracking-widest pl-4">
                    -- Filtrar por Nodo
                </div>

                <a onclick="portatiles()" class="categoria-item group">
                    <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Portátiles
                    <span class="status-badge mono">CAT_01</span>
                </a>

                <a onclick="PCsobremesa()" class="categoria-item group">
                    <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Sobremsa
                    <span class="status-badge mono">CAT_02</span>
                </a>
            </nav>

            <div class="mt-20 p-6 border border-zinc-900 rounded-sm">
                <p class="mono text-[9px] text-zinc-500 leading-relaxed uppercase">
                    Escaneo de stock activo. <br>
                    Sincronizado con Base Benicarló.
                </p>
            </div>
        </aside>

        <main class="contenido-principal">
            @auth
                @if(Auth::user()->rol === 'admin')
                    <a href="{{ route('Productos.create') }}" class="btn-admin">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Nivel Admin: Añadir Hardware
                    </a>
                @endif
            @endauth

            <div class="relative">
                <div class="absolute -top-10 left-0 mono text-[10px] text-red-600/50 uppercase tracking-[0.5em]">
                    Resultados_Encontrados
                </div>
                @yield('categoria')
            </div>
        </main>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function portatiles() {
        window.location.href = "{{ route('portatiles') }}";
    }

    function PCsobremesa() {
        window.location.href = "{{ route('inicio') }}";
    }
</script>
@stack('script-categorias')
@endpush
