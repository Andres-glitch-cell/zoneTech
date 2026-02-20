@extends('Productos.productosPlantilla')

@section('titulo', 'Sistemas Portátiles | ZoneTech')

@push('estilo-categorias')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* --- ESTILOS DE NÚCLEO ZONETECH --- */
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

        /* --- BOTONES DE ACCIÓN --- */
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

        .btn-add-list:hover { background: #ff2a2a; color: #fff; }

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

        .btn-delete-list:hover { background: #ff2a2a; color: #fff; border-color: #ff2a2a; }

        /* + ESTILO PARA FAVORITOS */
        .btn-fav {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border: 1px solid #333;
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-fav:hover { border-color: #ff2a2a; color: #ff2a2a; }

        /* Estado activo: Corazón rojo brillante */
        .btn-fav.active {
            background: #ff2a2a;
            color: #fff;
            border-color: #ff2a2a;
            box-shadow: 0 0 10px rgba(255, 42, 42, 0.5);
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
                            <button onclick="enviarAFavoritos('{{ $producto->nombre }}', '{{ $producto->id ?? 0 }}', this)"
                                    class="btn-fav"
                                    title="Añadir a Favoritos">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </button>

                            @if(Auth::user()->rol === 'administrador')
                                @if(isset($producto->id))
                                    {{-- CASO A: Producto en SQL (Borrado) --}}
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirmarBorrado(event)">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete-list">ELIMINAR</button>
                                    </form>
                                @else
                                    {{-- CASO B: Producto Demo (Guardado) --}}
                                    <form id="form-{{ $loop->index }}" action="{{ route('productos.store') }}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                                        <input type="hidden" name="precio" value="{{ $producto->precio }}">
                                    </form>
                                    <button onclick="enviarADatabase('{{ $producto->nombre }}', '{{ $loop->index }}')" class="btn-add-list">+ GUARDAR</button>
                                @endif
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        /* + FUNCIONALIDAD: FAVORITOS (CONEXIÓN AL CONTROLADOR) */
        function enviarAFavoritos(nombre, id, btn) {
            btn.classList.toggle('active');

            // Enviamos la petición al servidor sin recargar la página
            fetch("{{ route('favoritos.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ producto_id: id })
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Sincronización de Favoritos',
                    text: `${nombre} guardado en el sector personal.`,
                    showConfirmButton: false,
                    timer: 2500,
                    background: '#1a1a1e',
                    color: '#fff',
                    iconColor: '#ff2a2a'
                });
            })
            .catch(error => {
                console.error('Error en el enlace de datos:', error);
            });
        }

        /* @ FUNCIONALIDAD: GUARDAR EN BASE DE DATOS SQL */
        function enviarADatabase(nombre, index) {
            Swal.fire({
                title: '¿Sincronizar Hardware?',
                text: `Se escribirá ${nombre} en la base de datos oficial.`,
                icon: 'info',
                background: '#1a1a1e',
                color: '#fff',
                showCancelButton: true,
                confirmButtonColor: '#ff2a2a',
                confirmButtonText: 'SÍ, GUARDAR'
            }).then((res) => { if(res.isConfirmed) document.getElementById('form-'+index).submit(); });
        }

        /* ! FUNCIONALIDAD: ELIMINACIÓN FÍSICA */
        function confirmarBorrado(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿ELIMINAR PERMANENTEMENTE?',
                text: "Esta acción borrará el registro del SQL.",
                icon: 'warning',
                background: '#1a1a1e',
                color: '#fff',
                showCancelButton: true,
                confirmButtonColor: '#ff2a2a',
                confirmButtonText: 'ELIMINAR'
            }).then((res) => { if(res.isConfirmed) e.target.submit(); });
        }
    </script>
@endsection
