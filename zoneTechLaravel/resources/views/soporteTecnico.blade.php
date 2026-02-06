@extends('plantillaPrincipal')

@section('titulo', 'soporteTecnico')

@push('styles')
<link rel="stylesheet" href="">
<style>
    /*ARCHIVOS NO TOCAR: plantillaPrincipal, inicio, soporteTecnico y los nuevo q cree

    */
    h1 {
        color: blue;
    }
</style>
@endpush

@section('contenido')
<h1>Nuestro soporte técnico</h1>
<p>Pulsa el icono de la lupa → aparecerá el buscador animado con fondo en blur.</p>
@endsection

@push('scripts')

@endpush

