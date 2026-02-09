@extends('productosPlantilla')

@section('titulo', 'Portátiles')

@push('estilo-categorias')
<style>
    /* --- Contenido Principal --- */
        .encabezado-productos {
            margin-bottom: 32px;
        }

        .titulo-seccion {
            font-family: 'Outfit', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: -1.2px;
            margin-bottom: 8px;
            color: #ffffff;
        }

        .subtitulo-seccion {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.95rem;
        }

        /* Grid de productos placeholder */
        .grid-productos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
        }

        .producto-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .producto-card:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(255, 0, 0, 0.3);
            transform: translateY(-4px);
        }

        .producto-imagen {
            width: 100%;
            height: 180px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 8px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.2);
        }
</style>
@endpush

@section('categoria')
<div class="encabezado-productos">
    <h1 class="titulo-seccion">Portátiles</h1>
    <p class="subtitulo-seccion">Descubre nuestra selección de portátiles</p>
</div>

<div class="grid-productos">
    <!-- Tarjetas de producto de ejemplo -->
    <div class="producto-card">
        <div class="producto-imagen">
            <svg width="64" height="64" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <rect x="2" y="7" width="20" height="14" rx="2" />
                <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16" />
            </svg>
        </div>
        <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.1rem; margin-bottom: 8px;">Portátil
            Gaming</h3>
        <p style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">Intel Core i7 | 16GB RAM | RTX 4060
        </p>
        <p style="color: #ff2a2a; font-weight: 600; margin-top: 12px; font-size: 1.2rem;">1.299€</p>
    </div>

    <div class="producto-card">
        <div class="producto-imagen">
            <svg width="64" height="64" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <rect x="2" y="7" width="20" height="14" rx="2" />
                <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16" />
            </svg>
        </div>
        <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.1rem; margin-bottom: 8px;">Ultrabook
            Pro</h3>
        <p style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">AMD Ryzen 5 | 8GB RAM | 512GB SSD
        </p>
        <p style="color: #ff2a2a; font-weight: 600; margin-top: 12px; font-size: 1.2rem;">799€</p>
    </div>

    <div class="producto-card">
        <div class="producto-imagen">
            <svg width="64" height="64" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <rect x="2" y="7" width="20" height="14" rx="2" />
                <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16" />
            </svg>
        </div>
        <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.1rem; margin-bottom: 8px;">Business
            Laptop</h3>
        <p style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">Intel Core i5 | 16GB RAM | 1TB SSD
        </p>
        <p style="color: #ff2a2a; font-weight: 600; margin-top: 12px; font-size: 1.2rem;">949€</p>
    </div>
</div>
@endsection

@push('script-categorias')

@endpush