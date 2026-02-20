@extends('plantillaPrincipal')

@section('titulo', 'Añadir Producto')

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

        .form-card {
            background: #1a1a1e;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 40px;
            max-width: 600px;
        }

        .form-grupo {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            color: #ff2a2a;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .form-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 14px 16px;
            color: #fff;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #ff2a2a;
        }

        .form-error {
            color: #ff2a2a;
            font-size: 0.8rem;
            margin-top: 6px;
        }

        .btn-guardar {
            background: #ff2a2a;
            color: #fff;
            border: none;
            padding: 14px 32px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        .btn-guardar:hover {
            background: #e00;
            transform: translateY(-2px);
        }

        .btn-volver {
            background: transparent;
            color: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 14px 32px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.85rem;
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
        <h1 class="titulo-seccion">Añadir Producto</h1>
    </div>

    <div class="form-card">
        <form action="{{ route('Productos.store') }}" method="POST">
            @csrf

            <div class="form-grupo">
                <label class="form-label" for="nombre">Nombre del producto</label>
                <input
                    class="form-input"
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    placeholder="Ej: Titan Gaming X15"
                    required>
                @error('nombre')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-grupo">
                <label class="form-label" for="precio">Precio (€)</label>
                <input
                    class="form-input"
                    type="number"
                    id="precio"
                    name="precio"
                    value="{{ old('precio') }}"
                    placeholder="Ej: 1299.99"
                    step="0.01"
                    min="0"
                    required>
                @error('precio')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div style="display: flex; gap: 16px; margin-top: 32px;">
                <button type="submit" class="btn-guardar">Guardar Producto</button>
                <a href="{{ route('portatiles') }}" class="btn-volver">Volver</a>
            </div>
        </form>
    </div>
@endsection
