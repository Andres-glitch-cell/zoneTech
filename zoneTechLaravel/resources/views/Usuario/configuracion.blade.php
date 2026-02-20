@extends('plantillaPrincipal')

@section('titulo', 'Configuración de Sistema')

@push('styles')
<style>
    .maintenance-container {
        max-width: 800px;
        margin: 100px auto;
        text-align: center;
        padding: 40px;
        border: 1px dashed rgba(220, 38, 38, 0.3);
        position: relative;
        background: rgba(220, 38, 38, 0.02);
    }

    .maintenance-icon {
        width: 80px;
        height: 80px;
        color: #dc2626;
        margin-bottom: 24px;
        animation: pulse-red 2s infinite;
    }

    .maintenance-title {
        font-family: 'Outfit', sans-serif;
        font-size: 2rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #fff;
        margin-bottom: 16px;
    }

    .maintenance-text {
        color: #a1a1aa;
        font-size: 14px;
        max-width: 500px;
        margin: 0 auto 30px;
        line-height: 1.8;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        background: #1e1e1e;
        border: 1px solid #3f3f46;
        border-radius: 4px;
        font-family: 'Inter', sans-serif;
        font-size: 10px;
        font-weight: 800;
        color: #fbbf24; /* Ámbar / Aviso */
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-return {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
        padding: 12px 24px;
        background: #dc2626;
        color: white;
        text-decoration: none;
        font-weight: 900;
        font-size: 11px;
        text-transform: uppercase;
        transition: all 0.3s;
    }

    .btn-return:hover {
        background: #b91c1c;
        box-shadow: 0 0 20px rgba(220, 38, 38, 0.4);
    }

    @keyframes pulse-red {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }

    /* Decoración de esquinas estilo Tech */
    .corner {
        position: absolute;
        width: 15px;
        height: 15px;
        border: 2px solid #dc2626;
    }
    .top-left { top: -2px; left: -2px; border-right: 0; border-bottom: 0; }
    .bottom-right { bottom: -2px; right: -2px; border-left: 0; border-top: 0; }
</style>
@endpush

@section('principal')
<div class="maintenance-container">
    <div class="corner top-left"></div>
    <div class="corner bottom-right"></div>

    <svg class="maintenance-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
    </svg>

    <h1 class="maintenance-title">Módulo en Desarrollo</h1>

    <div class="status-badge">Estado: Access_Pending_v2.0</div>

    <p class="maintenance-text">
        Esta sección está siendo procesada para permitir la configuración avanzada de credenciales y personalización del núcleo.
        <br><br>
        <strong>Disculpamos las molestias. El acceso se habilitará en futuras actualizaciones del sistema.</strong>
    </p>

    <a href="{{ route('perfil') }}" class="btn-return">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Volver al Expediente
    </a>
</div>
@endsection
