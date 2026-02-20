@extends('Productos.productosPlantilla')

@section('titulo', 'Sistemas Portátiles')

@push('estilo-categorias')
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

        /* Estilo para botón de eliminar */
        .btn-delete-list {
            background: transparent;
            color: #666;
            border: 1px solid #333;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 800;
            font-size: 0.6rem;
            cursor: pointer;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .btn-delete-list:hover {
            background: #ff2a2a;
            color: #fff;
            border-color: #ff2a2a;
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
            $productosDemo = [
                ['nombre' => 'ZT-Titan v1: RTX 5090', 'precio' => 4299],
                ['nombre' => 'ZT-Blade Stealth: Ultra 7', 'precio' => 2199],
                ['nombre' => 'Andrés Special Edition: Liquid', 'precio' => 3500],
                ['nombre' => 'Carolina Workstation: Pro', 'precio' => 5100],
            ];

            // Si hay productos en la BD, los usamos. Si no, usamos los demo.
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
                        @auth
                            @if(Auth::user()->rol === 'administrador')
                                
                                @if(isset($producto->id))
                                    {{-- CASO A: El producto YA ESTÁ en la base de datos (Opción de Eliminar) --}}
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirmarBorrado(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete-list">
                                            ELIMINAR
                                        </button>
                                    </form>
                                @else
                                    {{-- CASO B: El producto es DEMO (Opción de Guardar) --}}
                                    <form id="form-{{ $loop->index }}" action="{{ route('productos.store') }}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                                        <input type="hidden" name="precio" value="{{ $producto->precio }}">
                                        <input type="hidden" name="categoria" value="portatil">
                                    </form>
                                    <button onclick="enviarADatabase('{{ $producto->nombre }}', '{{ $loop->index }}')" class="btn-add-list">
                                        + GUARDAR DB
                                    </button>
                                @endif

                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        // Función para Guardar
        function enviarADatabase(nombreProducto, index) {
            Swal.fire({
                title: '¿Sincronizar Hardware?',
                text: `Se añadirá ${nombreProducto} al inventario oficial.`,
                icon: 'info',
                background: '#1a1a1e',
                color: '#fff',
                confirmButtonColor: '#ff2a2a',
                showCancelButton: true,
                cancelButtonText: 'CANCELAR'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-' + index).submit();
                }
            });
        }

        // Función para Confirmar Borrado
        function confirmarBorrado(event) {
            event.preventDefault();
            const form = event.target;

            Swal.fire({
                title: '¿ELIMINAR PRODUCTO?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                background: '#1a1a1e',
                color: '#fff',
                confirmButtonColor: '#ff2a2a',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'SÍ, BORRAR',
                cancelButtonText: 'CANCELAR'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endsection