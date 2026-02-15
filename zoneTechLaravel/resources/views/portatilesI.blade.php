@extends('productosPlantilla')

@section('titulo', 'Sistemas Portátiles')

@push('estilo-categorias')
    <style>
        .encabezado-productos {
            margin-bottom: 40px;
            border-left: 4px solid #ff2a2a;
            padding-left: 20px;
        }

        .titulo-seccion {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: #ffffff !important;
            margin: 0;
            line-height: 1;
        }

        .grid-productos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            padding-bottom: 50px;
        }

        .producto-card {
            background: #1a1a1e;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 24px;
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .producto-card:hover {
            border-color: #ff2a2a;
            transform: translateY(-5px);
        }

        .producto-imagen {
            height: 160px;
            background: #000;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush

@section('categoria')
    <div class="encabezado-productos">
        <span
            style="color: #ff2a2a; font-weight: 800; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">Hardware
            Division</span>
        <h1 class="titulo-seccion">Sistemas Portátiles</h1>
    </div>

    <div class="grid-productos">
        {{-- Tarjeta de ejemplo --}}
        <div class="producto-card">
            <div class="producto-imagen">
                <svg width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="1.5">
                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                    <line x1="2" y1="20" x2="22" y2="20"></line>
                </svg>
            </div>
            <h3 style="color: #fff; font-size: 1.2rem; font-weight: 700; margin-bottom: 10px;">Titan Gaming X15</h3>
            <p style="color: rgba(255,255,255,0.5); font-size: 0.85rem; margin-bottom: 20px;">
                RTX 4060 • i7-13700H • 16GB RAM
            </p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span style="color: #fff; font-weight: 900; font-size: 1.5rem;">1.299€</span>
                <button
                    style="background: #fff; color: #000; border: none; padding: 8px 15px; border-radius: 6px; font-weight: 800; font-size: 0.7rem; cursor: pointer;">DETALLES</button>
            </div>
        </div>
    </div>
@endsection
