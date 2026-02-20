@extends('Productos.productosPlantilla')

@section('titulo', 'Sistemas Portátiles')

@push('estilo-categorias')
    <style>
        /* --- Encabezado con línea roja a la izquierda --- */
        .encabezado-productos {
            margin-bottom: 40px;
            border-left: 4px solid #ff2a2a;
            padding-left: 20px;
        }

        /* --- Título principal de la sección --- */
        .titulo-seccion {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: #ffffff !important;
            margin: 0;
            line-height: 1;
        }

        /* --- Grid responsive de tarjetas de productos --- */
        .grid-productos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            padding-bottom: 50px;
        }

        /* --- Tarjeta individual de producto --- */
        .producto-card {
            background: #1a1a1e;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 24px;
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        /* --- Efecto hover: borde rojo y elevación --- */
        .producto-card:hover {
            border-color: #ff2a2a;
            transform: translateY(-5px);
        }

        /* --- Contenedor de la imagen/icono del producto --- */
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

{{-- * Contenido principal que se inyecta en el @yield('categoria') de productosPlantilla --}}
@section('categoria')

    {{-- Encabezado de la sección con subtítulo y título --}}
    <div class="encabezado-productos">
        <span
            style="color: #ff2a2a; font-weight: 800; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">Hardware
            Division</span>
        <h1 class="titulo-seccion">Sistemas Portátiles</h1>
    </div>

    {{-- Grid de productos obtenidos desde la base de datos via ProductosController@index --}}
    <div class="grid-productos">

        {{-- * @forelse recorre $productos; si está vacío muestra el @empty --}}
        @forelse ($productos as $producto)

            {{-- Tarjeta individual de cada producto --}}
            <div class="producto-card">

                {{-- Imagen/icono representativo del producto --}}
                <div class="producto-imagen">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="1.5">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="2" y1="20" x2="22" y2="20"></line>
                    </svg>
                </div>

                {{-- Nombre del producto desde la BD --}}
                <h3 style="color: #fff; font-size: 1.2rem; font-weight: 700; margin-bottom: 10px;">{{ $producto->nombre }}</h3>

                {{-- Fila inferior: precio y botón de detalles --}}
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    {{-- Precio formateado con 2 decimales --}}
                    <span style="color: #fff; font-weight: 900; font-size: 1.5rem;">{{ number_format($producto->precio, 2) }}€</span>

                    {{-- + Enlace a la vista show del producto (productos.show) --}}
                    <a href="{{ route('Productos.show', $producto->id) }}"
                        style="background: #fff; color: #000; text-decoration: none; border: none; padding: 8px 15px; border-radius: 6px; font-weight: 800; font-size: 0.7rem; cursor: pointer;">DETALLES</a>

                </div>
            </div>

        {{-- ! Mensaje que se muestra si no hay productos en la base de datos --}}
        @empty
            <p style="color: rgba(255,255,255,0.4); margin-top: 20px;">No hay productos disponibles.</p>
        @endforelse

    </div>
@endsection