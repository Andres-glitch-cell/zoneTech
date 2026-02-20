@extends('plantillaPrincipal')

@section('titulo', $producto->nombre)

@push('styles')
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
            color: #ffffff;
            margin: 0;
            line-height: 1;
        }

        .detalle-card {
            background: #1a1a1e;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 40px;
            max-width: 600px;
        }

        .producto-imagen-grande {
            height: 220px;
            background: #000;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .detalle-label {
            color: #ff2a2a;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 6px;
        }

        .detalle-valor {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .precio-grande {
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 32px;
        }

        .acciones {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-editar {
            background: #ff2a2a;
            color: #fff;
            border: none;
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, transform 0.2s;
            display: inline-block;
        }

        .btn-editar:hover {
            background: #e00;
            transform: translateY(-2px);
        }

        .btn-eliminar {
            background: transparent;
            color: #ff2a2a;
            border: 1px solid #ff2a2a;
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-eliminar:hover {
            background: #ff2a2a;
            color: #fff;
        }

        .btn-volver {
            background: transparent;
            color: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-block;
        }

        .btn-volver:hover {
            border-color: rgba(255, 255, 255, 0.3);
            color: #fff;
        }
    </style>
@endpush

@section('principal')
    <div class="encabezado-productos">
        <span style="color: #ff2a2a; font-weight: 800; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px;">
            Hardware Division
        </span>
        <h1 class="titulo-seccion">Detalle del Producto</h1>
    </div>

    <div class="detalle-card">

        <div class="producto-imagen-grande">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="1.2">
                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                <line x1="2" y1="20" x2="22" y2="20"></line>
            </svg>
        </div>

        <p class="detalle-label">Nombre</p>
        <p class="detalle-valor">{{ $producto->nombre }}</p>

        <p class="detalle-label">Precio</p>
        <p class="precio-grande">{{ number_format($producto->precio, 2) }}€</p>

        <p class="detalle-label">Añadido el</p>
        <p class="detalle-valor">{{ $producto->created_at->format('d/m/Y') }}</p>

        <div class="acciones">
            <a href="{{ route('Productos.edit', $producto->id) }}" class="btn-editar">Editar</a>

            <form action="{{ route('Productos.destroy', $producto->id) }}" method="POST"
                onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-eliminar">Eliminar</button>
            </form>

            <a href="{{ route('portatiles') }}" class="btn-volver">Volver</a>
        </div>
    </div>
@endsection
