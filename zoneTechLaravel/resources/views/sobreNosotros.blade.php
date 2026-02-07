@extends('plantillaPrincipal')

@section('titulo', 'Sobre nosotros')

@push('styles')
<link rel="stylesheet" href="">
<style>
    h1 {
        color: #ff0000;
    }
</style>
@endpush

@section('principal')
<h1>Sobre nosotros</h1>
<p>Pulsa el icono de la lupa → aparecerá el buscador animado con fondo en blur.</p>
@endsection

@push('scripts')

@endpush