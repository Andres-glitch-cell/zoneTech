@extends('plantillaPrincipal')

@section('titulo', 'Catálogo de Productos')

@push('styles')
    <style>
        .contenedor-productos {
            display: flex;
            gap: 32px;
            align-items: flex-start;
            padding: 20px;
            min-height: 100vh;
            /* Asegura que el contenedor tenga altura */
        }

        .productos-categorias {
            width: 300px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 24px;
            position: sticky;
            top: 20px;
            /* Ajustado para que no choque con el header */
            max-height: calc(100vh - 40px);
            overflow-y: auto;
            z-index: 10;
        }

        .productos-titulo {
            font-family: 'Outfit', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            color: #ff2a2a;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 25px;
        }

        .categoria-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            color: #e0e0e0;
            text-decoration: none;
            border-radius: 10px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .categoria-item:hover {
            background: rgba(255, 42, 42, 0.1);
            color: #ff2a2a;
            transform: translateX(5px);
        }

        .contenido-principal {
            flex: 1;
            min-width: 0;
            position: relative;
        }
    </style>
    @stack('estilo-categorias')
@endpush

@section('principal')
    <div class="contenedor-productos">
        <aside class="productos-categorias">
            <h3 class="productos-titulo">Terminal de Productos</h3>
            <nav class="menu-categorias">
                <div
                    style="color: rgba(255,255,255,0.2); font-size: 0.7rem; font-weight: 800; text-transform: uppercase; margin: 15px 0 10px 15px;">
                    Informática</div>
                <a onclick="portatiles()" class="categoria-item">Portátiles</a>
                <a onclick="PCsobremesa()" class="categoria-item">PC sobremesa</a>
            </nav>
        </aside>

        <main class="contenido-principal">
            @yield('categoria')
        </main>
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
