@extends('Productos.productosPlantilla')

@section('titulo', 'Sistemas Portátiles')

@push('estilo-categorias')
    {{-- Importamos SweetAlert2 para el popup --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .producto-card:hover {
            border-color: #ff2a2a;
            transform: translateY(-5px);
            background: #212126;
        }

        .producto-imagen {
            height: 160px;
            background: #000;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #111;
        }

        /* Botón de añadir rápido */
        .btn-add-list {
            background: transparent;
            color: #ff2a2a;
            border: 1px solid #ff2a2a;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 800;
            font-size: 0.6rem;
            cursor: pointer;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .btn-add-list:hover {
            background: #ff2a2a;
            color: #fff;
        }
    </style>
@endpush

@section('categoria')

    <div class="encabezado-productos">
        <span style="color: #ff2a2a; font-weight: 800; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">
            Hardware Division // Sincronización con Base de Datos
        </span>
        <h1 class="titulo-seccion">Sistemas Portátiles</h1>
    </div>

    <div class="grid-productos">
        @php
            // Catálogo inicial de ZoneTech
            $productosDemo = [
                ['nombre' => 'ZT-Titan v1: RTX 5090', 'precio' => 4299],
                ['nombre' => 'ZT-Blade Stealth: Ultra 7', 'precio' => 2199],
                ['nombre' => 'Andrés Special Edition: Liquid', 'precio' => 3500],
                ['nombre' => 'Carolina Workstation: Pro', 'precio' => 5100],
                ['nombre' => 'ZT-Shadow: RTX 4080', 'precio' => 2899],
                ['nombre' => 'ZT-Air: Carbon Fiber', 'precio' => 1599],
                ['nombre' => 'Neuro-Link Pro: AI Ready', 'precio' => 3200],
                ['nombre' => 'ZT-Strike: RTX 4060', 'precio' => 1150],
                ['nombre' => 'Quantum Mobile: 128GB RAM', 'precio' => 4800],
                ['nombre' => 'ZT-Evo: i5 Business', 'precio' => 899],
            ];

            // Priorizamos los productos de la BD si existen
            $itemsAMostrar = count($productos) > 0 ? $productos : json_decode(json_encode($productosDemo));
        @endphp

        @foreach ($itemsAMostrar as $producto)
            <div class="producto-card">
                <div class="producto-imagen">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#ff2a2a" stroke-width="1" opacity="0.6">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="2" y1="20" x2="22" y2="20"></line>
                    </svg>
                </div>

                <h3 style="color: #fff; font-size: 1.1rem; font-weight: 700; margin-bottom: 10px; min-height: 50px;">
                    {{ $producto->nombre }}
                </h3>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                    <span style="color: #fff; font-weight: 900; font-size: 1.3rem;">
                        {{ number_format($producto->precio, 2) }}€
                    </span>

                    <div style="display: flex; gap: 8px;">
                        {{-- Formulario oculto que conecta con el ProductosController@store --}}
                        <form id="form-{{ $loop->index }}" action="{{ route('Productos.store') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                            <input type="hidden" name="precio" value="{{ $producto->precio }}">
                        </form>

                        <button onclick="enviarADatabase('{{ $producto->nombre }}', '{{ $loop->index }}')" class="btn-add-list">
                            + GUARDAR DB
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function enviarADatabase(nombreProducto, index) {
            // 1. Popup visual de ZoneTech
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                background: '#1a1a1e',
                color: '#ffffff',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'success',
                iconColor: '#ff2a2a',
                title: 'Sincronizando Hardware...',
                text: nombreProducto
            }).then(() => {
                // 2. Ejecutar el envío del formulario tras el aviso
                document.getElementById('form-' + index).submit();
            });
        }
    </script>
@endsection
