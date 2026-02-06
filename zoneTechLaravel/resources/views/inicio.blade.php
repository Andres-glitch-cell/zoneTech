@extends('plantillaPrincipal')

@section('titulo', 'Inicio')

@push('styles')
<link rel="stylesheet" href="">
<style>
    h1 {
        color: blue;
    }
</style>
@endpush

@section('contenido')
<h1>¡Bienvenido a ZoneTech!</h1>
<p>Pulsa el icono de la lupa → aparecerá el buscador animado con fondo en blur.</p>
@endsection

@push('scripts')
<script src="/js/alerta-libros.js"></script>
<script>
    console.log("Cargado el script de libros");
</script>
@endpush