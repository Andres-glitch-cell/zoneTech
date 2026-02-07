@extends('plantillaPrincipal')

@section('titulo', 'Inicio')

@push('styles')
<style>
    h1 {
        color: #ff2a2a;
    }
</style>
@endpush

@section('principal')
<h1>Productos</h1>
<p>Pulsa el icono de la lupa → aparecerá el buscador animado con fondo en blur.</p>
@endsection

@push('scripts')

@endpush
